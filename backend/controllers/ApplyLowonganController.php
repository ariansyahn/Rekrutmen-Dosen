<?php

namespace backend\controllers;

use Yii;
use backend\models\ApplyLowongan;
use backend\models\TanggalTes;
use backend\models\Microteaching;
use backend\models\form\NilaiMicroForm;
use backend\models\form\TanggalMicroForm;
use backend\models\TesKesehatan;
use backend\models\form\NilaiKesehatanForm;
use backend\models\form\TanggalKesehatanForm;
use backend\models\Psikotes;
use backend\models\form\NilaiPsikotesForm;
use backend\models\form\TanggalPsikotesForm;
use backend\models\ApplyLowonganSearch;
use backend\models\ApplyLowonganStatus;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ApplyLowonganController implements the CRUD actions for ApplyLowongan model.
 */
class ApplyLowonganController extends Controller
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
                'only' => ['apply-lowongan-tentukan-tanggal-microteaching','apply-lowongan-ditolak','input-nilai-microteaching','update-nilai-microteaching'],
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
                'only' => ['apply-lowongan-lulus-berkas','apply-lowongan-diterima','apply-lowongan-ditolak','menentukan-tanggal-microteaching','update-tanggal-microteaching','apply-lowongan-lulus-microteaching',
            'apply-lowongan-lanjut-psikotes','menentukan-tanggal-psikotes','update-tanggal-psikotes','input-nilai-psikotes','update-nilai-psikotes','apply-lowongan-lulus-psikotes',
            'apply-lowongan-lanjut-kesehatan','menentukan-tanggal-kesehatan','update-tanggal-kesehatan','input-nilai-kesehatan','update-nilai-kesehatan','apply-lowongan-lulus-kesehatan'],
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
     * Lists all ApplyLowongan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplyLowonganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApplyLowongan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $psiko = Psikotes::find()->where(['id_apply_lowongan'=>$id])->one();
        $sehat = TesKesehatan::find()->where(['id_apply_lowongan'=>$id])->one();
        $micro = Microteaching::find()->where(['id_apply_lowongan'=>$id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'psiko' => $psiko,
            'sehat' => $sehat,
            'micro' => $micro,
        ]);
    }

    /**
     * Creates a new ApplyLowongan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionMenentukanTanggalMicroteaching($id)
    {
        $apply = $this->findModel($id);
        $model = new TanggalTes();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('d-m-Y');
        $model->id_apply_lowongan = $id;
        $model->tanggal_psikotes = "0000-00-00";
        $model->tanggal_kesehatan = "0000-00-00";
        if ($model->load(Yii::$app->request->post()) ) {
            $model->tanggal_microteaching = self::convertToSQLDate($model->tanggal_microteaching);
            $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Microteaching');
            $model->save();
            $apply->save();
            return $this->redirect(['view', 'id' => $model->id_apply_lowongan]);
        } else {
            return $this->render('TanggalMicroAdd', [
                'model' => $model,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionUpdateTanggalMicroteaching($id)
    {
        $tanggal = TanggalTes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new TanggalMicroForm();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('d-m-Y');
        if ($model->load(Yii::$app->request->post())) {
            $tanggal->tanggal_microteaching = self::convertToSQLDate($model->tanggal_microteaching);
            $tanggal->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            $model->tanggal_microteaching = self::convertToDisplayDate($tanggal->tanggal_microteaching);
            $model->isNewRecord = false;
            return $this->render('TanggalMicroEdit', [
                'model' => $model,
                'id' => $id,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionApplyLowonganLulusBerkas($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Seleksi Berkas');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganTentukanTanggalMicroteaching($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Microteaching');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionInputNilaiMicroteaching($id)
    {
        $model = new NilaiMicroForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $micro = new Microteaching();
                $micro->id_apply_lowongan = $id;
                $micro->nilai_microteaching = $model->nilai_microteaching;
                
                if(!$micro->save()) {
                    throw new Exception('Failed to save Nilai');
                }
                $apply = $this->findModel($id);
                $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Microteaching');
                if(!$apply->save()) {
                    throw new Exception('Failed to save Status');
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

            return $this->render('NilaiMicroAdd', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateNilaiMicroteaching($id)
    {
        $micro = Microteaching::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new NilaiMicroForm();
        if ($model->load(Yii::$app->request->post())) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $micro->nilai_microteaching = $model->nilai_microteaching;
                if(!$micro->save()) {
                    throw new Exception('Failed to save Nilai');
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
            $model->nilai_microteaching = $micro->nilai_microteaching;
            $model->isNewRecord = false;
            return $this->render('NilaiMicroAdd', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionApplyLowonganLulusMicroteaching($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Microteaching');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganLanjutPsikotes($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Psikotes');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganIkutPsikotes($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Mengikuti Psikotes');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionMenentukanTanggalPsikotes($id)
    {
        $tanggal = TanggalTes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new TanggalPsikotesForm();
        date_default_timezone_set('Asia/Jakarta');
        $apply = $this->findModel($id);
        $currentDate = date('d-m-Y');
        if ($model->load(Yii::$app->request->post()) ) {
            $tanggal->tanggal_psikotes = self::convertToSQLDate($model->tanggal_psikotes);
            $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Psikotes');
            $apply->save();
            $tanggal->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('TanggalPsikotesAdd', [
                'model' => $model,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionUpdateTanggalPsikotes($id)
    {
        $tanggal = TanggalTes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new TanggalPsikotesForm();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('d-m-Y');
        if ($model->load(Yii::$app->request->post())) {
            $tanggal->tanggal_psikotes = self::convertToSQLDate($model->tanggal_psikotes);
            $tanggal->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            $model->tanggal_psikotes = self::convertToDisplayDate($tanggal->tanggal_psikotes);
            $model->isNewRecord = false;
            return $this->render('TanggalPsikotesEdit', [
                'model' => $model,
                'id' => $id,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionInputNilaiPsikotes($id)
    {
        $model = new NilaiPsikotesForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $psiko = new Psikotes();
                $psiko->id_apply_lowongan = $id;
                $psiko->nilai_psikotes = $model->nilai_psikotes;
                
                if(!$psiko->save()) {
                    throw new Exception('Failed to save Nilai');
                }

                $apply = $this->findModel($id);
                $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Psikotes');
                if(!$apply->save()) {
                    throw new Exception('Failed to save Status');
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

            return $this->render('NilaiPsikotesAdd', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateNilaiPsikotes($id)
    {
        $psiko = Psikotes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new NilaiPsikotesForm();
        if ($model->load(Yii::$app->request->post())) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $psiko->nilai_psikotes = $model->nilai_psikotes;
                
                if(!$psiko->save()) {
                    throw new Exception('Failed to save Nilai');
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
            $model->nilai_psikotes = $psiko->nilai_psikotes;
            $model->isNewRecord = false;
            return $this->render('NilaiPsikotesAdd', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionApplyLowonganLulusPsikotes($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Psikotes');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganLanjutKesehatan($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Tes Kesehatan');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionMenentukanTanggalKesehatan($id)
    {
        $tanggal = TanggalTes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new TanggalKesehatanForm();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('d-m-Y');
        $apply = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) ) {
            $tanggal->tanggal_kesehatan = self::convertToSQLDate($model->tanggal_kesehatan);
            $tanggal->save();
            $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Tes Kesehatan');
            $apply->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('TanggalKesehatanAdd', [
                'model' => $model,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionUpdateTanggalKesehatan($id)
    {
        $tanggal = TanggalTes::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new TanggalKesehatanForm();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('d-m-Y');
        if ($model->load(Yii::$app->request->post())) {
            $tanggal->tanggal_kesehatan = self::convertToSQLDate($model->tanggal_kesehatan);
            $tanggal->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            $model->tanggal_kesehatan = self::convertToDisplayDate($tanggal->tanggal_kesehatan);
            $model->isNewRecord = false;
            return $this->render('TanggalKesehatanEdit', [
                'model' => $model,
                'id' => $id,
                'currentDate' => $currentDate,
            ]);
        }
    }

    public function actionInputNilaiKesehatan($id)
    {
        $model = new NilaiKesehatanForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $sehat = new TesKesehatan();
                $sehat->id_apply_lowongan = $id;
                $sehat->nilai_tes_kesehatan = $model->nilai_tes_kesehatan;
                $sehat->keterangan = $model->keterangan;
                
                if(!$sehat->save()) {
                    throw new Exception('Failed to save Nilai');
                }

                $apply = $this->findModel($id);
                $apply->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan');
                if(!$apply->save()) {
                    throw new Exception('Failed to save Status');
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

            return $this->render('NilaiKesehatanAdd', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateNilaiKesehatan($id)
    {
        $sehat = TesKesehatan::find()->where(['id_apply_lowongan'=>$id])->one();
        $model = new NilaiKesehatanForm();
        if ($model->load(Yii::$app->request->post())) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $sehat->nilai_tes_kesehatan = $model->nilai_tes_kesehatan;
                $sehat->keterangan = $model->keterangan;
                
                if(!$sehat->save()) {
                    throw new Exception('Failed to save Nilai');
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
            $model->nilai_tes_kesehatan = $sehat->nilai_tes_kesehatan;
            $model->keterangan = $sehat->keterangan;
            $model->isNewRecord = false;
            return $this->render('NilaiKesehatanAdd', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionApplyLowonganLulusKesehatan($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganDiterima($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Diterima');
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApplyLowonganDitolak($id)
    {
        $model = $this->findModel($id);
        $model->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId('Ditolak');
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing ApplyLowongan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_apply_lowongan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ApplyLowongan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplyLowongan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApplyLowongan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplyLowongan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     /**
     * Finds the TanggalTes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TanggalTes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelTanggal($id)
    {
        
        if (($model = TanggalTes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
    public static function convertToSQLDate($date) {
        return date('Y-m-d', strtotime($date));
    }

    public static function convertToDisplayDate($date) {
        return date('d F Y', strtotime($date));
    }
}
