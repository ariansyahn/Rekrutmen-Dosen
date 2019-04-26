<?php

namespace backend\controllers;

use backend\models\form\AdminHrdAddForm;
use backend\models\form\AdminKoordinatorAddForm;
//use backend\models\UnitAkunRelation;
use backend\models\Unit;
use Yii;
use backend\models\Akun;
use backend\models\Role;
//use backend\models\AkunRoleRelation;
use backend\models\AkunSearch;
use yii\web\Controller;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\IntegrityException;

/**
 * AkunController implements the CRUD actions for Akun model.
 */
class AkunController extends Controller
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
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isSuperAdmin;
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Akun models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AkunSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Akun model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAdminHrdAdd()
    {
        $model = new AdminHrdAddForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $user = new Akun();
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->id_role = Role::getUserRoleId('Admin HRD');

                if(!$user->save()) {
                    // Rollback if user not saved
                    throw new Exception('Failed to save User');
                }

            } catch (Exception $ex) {
                // Rollback if any save() failed
                $transaction->rollBack();
                die($ex->getMessage());

                return $this->render('AdminHrdAdd', [
                    'model' => $user,
                ]);
            }

            // Commit Transaction
            $transaction->commit();

            return $this->redirect(['index']);
        } else {
            return $this->render('AdminHrdAdd', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdminKoordinatorAdd()
    {
        $model = new AdminKoordinatorAddForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Start transaction
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $user = new Akun();
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->id_role = Role::getUserRoleId('Admin Koordinator Unit');

                if(!$user->save()) {
                    // Rollback if user not saved
                    throw new Exception('Failed to save User');
                }

                $unit = new Unit();
                $unit->nama_unit = $model->unit;
                $unit->id_akun = $user->id_akun;

                if(!($unit->save())) {
                    // Rollback if details not saved
                    throw new Exception('Failed to save User Details');
                }

            } catch (Exception $ex) {
                // Rollback if any save() failed
                $transaction->rollBack();
                die($ex->getMessage());

                return $this->render('AdminKoordinatorAdd', [
                    'model' => $model,
                ]);
            }

            // Commit Transaction
            $transaction->commit();

            return $this->redirect(['index']);
        } else {
            return $this->render('AdminKoordinatorAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Akun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_akun]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Akun model.
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
     * Finds the Akun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Akun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Akun::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
