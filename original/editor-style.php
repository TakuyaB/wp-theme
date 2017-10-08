<?php
add_editor_style('editor-style.css'); //ビジュアルエディタ用CSSを読み込む

function custom_editor_settings( $initArray ){
$initArray['body_class'] = 'editor-area'; //オリジナルのクラスを設定する
return $initArray;
}

add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//ビジュアルエディタにフォントサイズ変更ドロップダウンリストを追加
//参考：https://nelog.jp/wordpress-visual-editor-font-size
add_filter( 'tiny_mce_before_init', function ($settings) {
    //フォントサイズの指定
    $settings['fontsize_formats'] =
        '10px 12px 14px 16px 18px 20px 24px 28px 32px 36px 42px 48px';
    //$settings['fontsize_formats'] = '0.8em 1.6em 2em 3em';
    //$settings['fontsize_formats'] = '80% 160% 200% 300%';
    return $settings;
} );

add_filter('mce_buttons_3', function ($buttons){
    array_push($buttons, 'fontsizeselect');
    return $buttons;
})
?>