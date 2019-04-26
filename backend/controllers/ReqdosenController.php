<?php

namespace backend\controllers;

use backend\models\Unit;
use backend\models\UnitReqdosenRelation;
use Yii;
use backend\models\Reqdosen;
use backend\models\LowonganStatus;
use backend\models\form\ReqdosenForm;
use backend\models\ReqdosenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\db\Query;
/**
 * ReqdosenController implements the CRUD actions for Reqdosen model.
 */
class ReqdosenController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['request-dosen-add', 'request-dosen-edit', 'request-dosen-delete','request-dosen-update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdminKoordinatorUnit;
                        }
                    ],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['buat-lowongan','tutup-lowongan','request-dosen-delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdminHRD;
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Reqdosen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReqdosenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $query = Unit::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
        // $id_unit = $unit->id_unit;
        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        // ]);

        // $dataProvider = ArrayHelper::getColumn($id_unit, 'id_request');
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reqdosen model.
     * @param integer $id
     * @return mixed
     */
    public function actionRequestDosenView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reqdosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRequestDosenAdd()
    {
        $model = new ReqdosenForm();
        $units = Unit::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
//        $units = Unit::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();
        
            try {
                $reqdosen = new Reqdosen();
                $reqdosen->id_matkul = $model->id_matkul;
                $reqdosen->jumlah_dosen = $model->jumlah_dosen;
                $reqdosen->deskripsi_pekerjaan = $model->deskripsi_pekerjaan;
                $reqdosen->spesifikasi_dosen = $model->spesifikasi_dosen;
//              $reqdosen->id_koordinator = \Yii::$app->user->identity->id_akun;
                $reqdosen->id_lowongan_status = LowonganStatus::getLowonganKerjaStatusId("Request");

                if(!$reqdosen->save()) {
                    throw new Exception('Failed to save Request');
                }

                $unit = new UnitReqdosenRelation();
                $unit->id_reqdosen = $reqdosen->id_request;
                $unit->id_unit = $units->id_unit;
                if(!$unit->save()){
                    throw new Exception('Failed to save Unit Reqdosen');
                }

            } catch (Exception $ex) {
                // Rollback if any save() failed
                $transaction->rollBack();
                die($ex->getMessage());

            }

            // Commit Transaction
            $transaction->commit();

            return $this->redirect(['index']);
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reqdosen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBuatLowongan($id)
    {
        $reqdosen = $this->findModel($id);
        $model = new ReqdosenForm();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {
                $reqdosen->id_matkul = $model->id_matkul;
                $reqdosen->jumlah_dosen = $model->jumlah_dosen;
                $reqdosen->deskripsi_pekerjaan = $model->deskripsi_pekerjaan;
                $reqdosen->spesifikasi_dosen = $model->spesifikasi_dosen;
                $reqdosen->id_lowongan_status = LowonganStatus::getLowonganKerjaStatusId("Open");

                if(!$reqdosen->save()) {
                    throw new Exception('Failed to save Request');
                }

            } catch (Exception $ex) {
                // Rollback if any save() failed
                $transaction->rollBack();
                die($ex->getMessage());

            }

            // Commit Transaction
            $transaction->commit();
            return $this->redirect(['request-dosen-view', 'id' => $id]);
        } else {
                $model->id_matkul = $reqdosen->id_matkul;
                $model->jumlah_dosen = $reqdosen->jumlah_dosen;
                $model->deskripsi_pekerjaan = $reqdosen->deskripsi_pekerjaan;
                $model->spesifikasi_dosen = $reqdosen->spesifikasi_dosen;
                $model->isNewRecord = false;
            return $this->render('BuatLowongan', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionTutupLowongan($id)
    {
        $model = $this->findModel($id);
        $model->id_lowongan_status = LowonganStatus::getLowonganKerjaStatusId("Closed");
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionRequestDosenUpdate($id)
    {
        $reqdosen = $this->findModel($id);
        $model = new ReqdosenForm();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {
                $reqdosen->id_matkul = $model->id_matkul;
                $reqdosen->jumlah_dosen = $model->jumlah_dosen;
                $reqdosen->deskripsi_pekerjaan = $model->deskripsi_pekerjaan;
                $reqdosen->spesifikasi_dosen = $model->spesifikasi_dosen;
                $reqdosen->id_lowongan_status = LowonganStatus::getLowonganKerjaStatusId("Request");

                if(!$reqdosen->save()) {
                    throw new Exception('Failed to save Request');
                }

            } catch (Exception $ex) {
                // Rollback if any save() failed
                $transaction->rollBack();
                die($ex->getMessage());

            }

            // Commit Transaction
            $transaction->commit();
            return $this->redirect(['request-dosen-view', 'id' => $id]);
        } else {
                $model->id_matkul = $reqdosen->id_matkul;
                $model->jumlah_dosen = $reqdosen->jumlah_dosen;
                $model->deskripsi_pekerjaan = $reqdosen->deskripsi_pekerjaan;
                $model->spesifikasi_dosen = $reqdosen->spesifikasi_dosen;
                $model->isNewRecord = false;
            return $this->render('update', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Deletes an existing Reqdosen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionRequestDosenDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reqdosen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reqdosen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reqdosen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
