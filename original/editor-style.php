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
//Wordpressビジュアルエディタに文字サイズの変更機能を追加
add_filter('mce_buttons_3', function ($buttons){
    array_push($buttons, 'fontsizeselect');
    return $buttons;
});

//ビジュアルエディタ:文字などのスタイル指定機能を追加
//参考：http://com4tis.net/tinymce-advanced-post-custom/
if ( !function_exists( 'initialize_tinymce_styles' ) ):
    function initialize_tinymce_styles($init_array) {
        //追加するスタイルの配列を作成
        $style_formats = array(
            array(
                'title' => '赤マーカー',
                'inline' => 'span',
                'classes' => 'red-marker'
            ),
            array(
                'title' => '青マーカー',
                'inline' => 'span',
                'classes' => 'blue-marker'
            ),
            array(
                'title' => '黄マーカー',
                'inline' => 'span',
                'classes' => 'yellow-marker'
            ),
            array(
                'title' => '緑マーカー',
                'inline' => 'span',
                'classes' => 'green-marker'
            ),
            array(
                'title' => '黄ボックス',
                'block' => 'div',
                'classes' => 'information-box',
                'wrapper' => true,
                'merge_siblings' => false
            ),
            array(
                'title' => '赤ボックス',
                'block' => 'div',
                'classes' => 'warning-box',
                'wrapper' => true,
                'merge_siblings' => false
            ),
            array(
                'title' => '緑ボックス',
                'block' => 'div',
                'classes' => 'green-box',
                'wrapper' => true,
                'merge_siblings' => false
            )
        );
        //JSONに変換
        $init_array['style_formats'] = json_encode($style_formats);
        return $init_array;
    }
endif;
add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);

//TinyMCEにスタイルセレクトボックスを追加
//https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
if ( !function_exists( 'add_styles_to_tinymce_buttons' ) ):
    function add_styles_to_tinymce_buttons($buttons) {
        //見出しなどが入っているセレクトボックスを取り出す
        $temp = array_shift($buttons);
        //先頭にスタイルセレクトボックスを追加
        array_unshift($buttons, 'styleselect');
        //先頭に見出しのセレクトボックスを追加
        array_unshift($buttons, $temp);

        return $buttons;
    }
endif;
add_filter('mce_buttons_3','add_styles_to_tinymce_buttons');
?>