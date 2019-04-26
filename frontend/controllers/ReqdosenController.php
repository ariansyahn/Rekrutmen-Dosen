<?php

namespace frontend\controllers;

use backend\models\ApplyLowongan;
use backend\models\Pelamar;
use backend\models\ApplyLowonganStatus;
use backend\models\form\ReqdosenForm;
use backend\models\LowonganStatus;
use frontend\models\form\ApplyLowonganUploadFileForm;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use Yii;
use backend\models\Reqdosen;
use backend\models\ReqdosenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\data\Pagination;


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
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['view'],
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'roles' => ['@'],
            //             'matchCallback' => function ($rule, $action) {
            //                 return Yii::$app->user->identity->isPelamar;
            //             }
            //         ],
            //     ],
            // ],
        ];
    }

    /**
     * Lists all Reqdosen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReqdosenSearch();
        $dataProvider = $searchModel->searchOpen(Yii::$app->request->queryParams);

        $query = $dataProvider->query;
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->pageSize=10;

        $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

        $loker = Reqdosen::find()->orderBy(['id_request' => SORT_DESC])->limit(5)->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $models,
            'pages' => $pages,
            'loker' => $loker,
        ]);
    }

    /**
     * Displays a single Reqdosen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model_form = new ApplyLowonganUploadFileForm();
        //Redirect to login
        // if(Yii::$app->user->isGuest){
        //     return $this->redirect(['site/login']);
        // }
        if(!Yii::$app->user->isGuest){
            $id_akun = Pelamar::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
            $status_apply_diproses = ApplyLowonganStatus::getApplyLowonganStatusId("Sedang Diproses");
            $s2 = ApplyLowonganStatus::getApplyLowonganStatusId("Lulus Seleksi Berkas");
            $s3 = ApplyLowonganStatus::getApplyLowonganStatusId("Lulus Tes Microteaching");
            $s4 = ApplyLowonganStatus::getApplyLowonganStatusId("Lulus Psikotes");
            $s5 = ApplyLowonganStatus::getApplyLowonganStatusId("Lulus Tes Kesehatan");
            $s6 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Tanggal Microteaching");
            $s7 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Tanggal Psikotes");
            $s8 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Tanggal Tes Kesehatan");
            $s9 = ApplyLowonganStatus::getApplyLowonganStatusId("Memasukkan Nilai Microteaching");
            $s10 = ApplyLowonganStatus::getApplyLowonganStatusId("Memasukkan Nilai Psikotes");
            $s11 = ApplyLowonganStatus::getApplyLowonganStatusId("Memasukkan Nilai Tes Kesehatan");
            $s12 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Kelulusan Microteaching");
            $s13 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Kelulusan Psikotes");
            $s14 = ApplyLowonganStatus::getApplyLowonganStatusId("Menentukan Kelulusan Tes Kesehatan");
            $s15 = ApplyLowonganStatus::getApplyLowonganStatusId("Diterima");
            $status_apply_diterima = ApplyLowonganStatus::getApplyLowonganStatusId("Diterima");
    
            $already_applied_here = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_reqdosen' => $id])
                ->exists();
    
            $already_applied_elsewhere = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $status_apply_diproses])
                ->exists();
    
                $a2 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s2])
                ->exists();
    
                $a3 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s3])
                ->exists();
    
                $a4 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s4])
                ->exists();
    
                $a5 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s5])
                ->exists();
                
                $a6 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s6])
                ->exists();
    
                $a7 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s7])
                ->exists();
    
                $a8 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s8])
                ->exists();
    
                $a9 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s9])
                ->exists();
    
                $a10 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s10])
                ->exists();
    
                $a11 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s11])
                ->exists();
    
                $a12 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s12])
                ->exists();
    
                $a13 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s13])
                ->exists();
    
                $a14 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s14])
                ->exists();
    
                $a15 = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
                ->andWhere(['id_apply_lowongan_status' => $s15])
                ->exists();
    
            $already_accepted_elsewhere = ApplyLowongan::find()
                ->join('INNER JOIN', Reqdosen::tableName(), Reqdosen::tableName() . '.id_request = ' . ApplyLowongan::tableName() . '.id_reqdosen')
                ->where(['id_pelamar' => $id_akun->id_pelamar])
                ->andWhere([ApplyLowongan::tableName() . '.id_apply_lowongan_status' => $status_apply_diterima])
                ->exists();
    
            return $this->render('view', [
                'model' => $model,
                'model_form' => $model_form,
                'already_applied_here' => $already_applied_here,
                'already_applied_elsewhere' => $already_applied_elsewhere,
                'already_accepted_elsewhere' => $already_accepted_elsewhere,
                'a2' => $a2,
                'a3' => $a3,
                'a4' => $a4,
                'a5' => $a5,
                'a6' => $a6,
                'a7' => $a7,
                'a8' => $a8,
                'a9' => $a9,
                'a10' => $a10,
                'a11' => $a11,
                'a12' => $a12,
                'a13' => $a13,
                'a14' => $a14,
                'a15' => $a15,
            ]);
        }
        else{
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Displays a single LowonganKerja model.
     * @param integer $id
     * @return mixed
     */
    public function actionLowonganKerjaView($id)
    {
        $model = $this->findModel($id);

        $model_form = new ApplyLowonganUploadFileForm();

        //Redirect to login
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $id_akun = Pelamar::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
        $status_apply_diproses = ApplyLowonganStatus::getApplyLowonganStatusId("Sedang Diproses");
        $status_apply_diterima = ApplyLowonganStatus::getApplyLowonganStatusId("Diterima");

        $already_applied_here = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
            ->andWhere(['id_reqdosen' => $id])
            ->exists();

        $already_applied_elsewhere = ApplyLowongan::find()->where(['id_pelamar' => $id_akun])
            ->andWhere(['id_apply_lowongan_status' => $status_apply_diproses])
            ->exists();

        $already_accepted_elsewhere = ApplyLowongan::find()
            ->join('INNER JOIN', Reqdosen::tableName(), Reqdosen::tableName() . '.id_reqdosen = ' . ApplyLowongan::tableName() . '.id_reqdosen')
            ->where(['id_pelamar' => $id_akun])
            ->andWhere([ApplyLowongan::tableName() . '.id_apply_lowongan_status' => $status_apply_diterima])
            ->exists();

        return $this->render('LowonganKerjaView', [
            'model' => $model,
            'already_applied_here' => $already_applied_here,
            'already_applied_elsewhere' => $already_applied_elsewhere,
            'already_accepted_elsewhere' => $already_accepted_elsewhere,
            'model_form' => $model_form,
        ]);
    }

    public function actionLowonganKerjaApply($id)
    {
        $model = new ApplyLowonganUploadFileForm();
        // $id_akun = Pelamar::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->asArray()->one();
        $pelamar = Pelamar::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
         // var_dump($id_akun);
        // die();

        if ($model->load(Yii::$app->request->post())) {
            // Menyimpan berkas pelamar
            $path = Yii::getAlias('@backend') . '/web/uploads/berkas_pelamar/'; // file path
            $model->foto = UploadedFile::getInstance($model, 'foto');
            $model->ktp = UploadedFile::getInstance($model, 'ktp');
            $model->cv = UploadedFile::getInstance($model, 'cv');
            $model->ijazah = UploadedFile::getInstance($model, 'ijazah');
            $model->kartu_keluarga = UploadedFile::getInstance($model, 'kartu_keluarga');
            $model->skck = UploadedFile::getInstance($model, 'skck');
            $model->transkrip_nilai = UploadedFile::getInstance($model, 'transkrip_nilai'); 
            $model->keterangan_pengalaman_kerja = UploadedFile::getInstance($model, 'keterangan_pengalaman_kerja');

            if($model->ktp && $model->foto && $model->cv && $model->ijazah && $model->kartu_keluarga && $model->skck && $model->transkrip_nilai && $model->keterangan_pengalaman_kerja && $model->validate()) {
                $model->ktp->saveAs($path . 'ktp_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->ktp->extension);
                $model->foto->saveAs($path . 'foto_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->foto->extension);
                $model->cv->saveAs($path . 'cv_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->cv->extension);
                $model->ijazah->saveAs($path . 'ijazah_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->ijazah->extension);
                $model->kartu_keluarga->saveAs($path . 'kk_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->kartu_keluarga->extension);
                $model->skck->saveAs($path . 'skck_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->skck->extension);
                $model->transkrip_nilai->saveAs($path . 'transkripnilai_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->transkrip_nilai->extension);
                $model->keterangan_pengalaman_kerja->saveAs($path . 'pengalamankerja_' . $id . '_' .$pelamar->id_pelamar . '.' . $model->keterangan_pengalaman_kerja->extension);

                $apply_lowongan = new ApplyLowongan();
                $apply_lowongan->id_pelamar = $pelamar->id_pelamar;
                $apply_lowongan->id_reqdosen = $id;
                $apply_lowongan->id_apply_lowongan_status = ApplyLowonganStatus::getApplyLowonganStatusId("Sedang Diproses");
                $apply_lowongan->ktp = ('ktp_' . $id . '_' . $pelamar->id_pelamar. '.' . $model->ktp->extension);
                $apply_lowongan->foto = ('foto_' . $id . '_' . $pelamar->id_pelamar. '.' . $model->foto->extension);
                $apply_lowongan->cv = ('cv_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->cv->extension);
                $apply_lowongan->ijazah = ('ijazah_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->ijazah->extension);
                $apply_lowongan->kartu_keluarga = ('kk_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->kartu_keluarga->extension);
                $apply_lowongan->skck = ('skck_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->skck->extension);
                $apply_lowongan->transkrip_nilai = ('transkripnilai_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->transkrip_nilai->extension);
                $apply_lowongan->keterangan_pengalaman_kerja = ('pengalamankerja_' . $id . '_' . $pelamar->id_pelamar . '.' . $model->keterangan_pengalaman_kerja->extension);
                // var_dump($model);
                // die();
            
                if($apply_lowongan->save()) {

                } else {
                    print_r($apply_lowongan->getErrors());
                    die();
                }
            }
        }


        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Creates a new Reqdosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reqdosen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_request]);
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_request]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reqdosen model.
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
