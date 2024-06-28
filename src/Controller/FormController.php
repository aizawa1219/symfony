<?php

class FormController extends Controller {
    //認証が必要なアクション名の配列
    //今回のアプリでは認証が必要なアクションはない
    protected $auth_actions = array();
    
    //インデックスアクション
    public function indexAction() {
        /*
         * モデルからフォームで利用する
         * データ項目が格納されたハッシュ配列を取得
         */
        $form = $this->db_manager->get('Form')->getFormModel();
        
        //セッションから情報を取得
        $session_form = $this->session->get("form");
        //セッション情報があれば、配列同士をマージする
        if(!is_null($session_form)) {
            $form = array_merge($form,$session_form);
        }
        //Viewテンプレートに渡すデータ配列作成
        $data = array(
            "form" => $form,
        );
        return $this->render($data);
    }
}
