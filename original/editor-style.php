<?php
add_editor_style('editor-style.css'); //ビジュアルエディタ用CSSを読み込む
function custom_editor_settings( $initArray ){
$initArray['body_class'] = 'editor-area'; //オリジナルのクラスを設定する
return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

// ビジュアルエディタに表(テーブル)の機能を追加
function mce_external_plugins_table($plugins) {
    $plugins['table'] = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

// ビジュアルエディタにテーブルを配置するボタンを追加
function mce_buttons_table($buttons) {
    $buttons[] = 'table';
    return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );

//
//
//
// ビジュアルエディタにHTMLを直挿入するためのボタンを追加
function add_insert_html_button( $buttons ) {
    $buttons[] = 'button_insert_html';
    return $buttons;
}
add_filter( 'mce_buttons', 'add_insert_html_button' );

function add_insert_html_button_plugin( $plugin_array ) {
    $plugin_array['custom_button_script'] =  get_stylesheet_directory_uri() . "/editor-style.js";
    return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_insert_html_button_plugin' );
//
//
//

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
                'title' => '太字',
                'inline' => 'span',
                'classes' => 'bold'
            ),
            array(
                'title' => '赤マーカー',
                'inline' => 'span',
                'classes' => 'red-marker',
                'wrapper' => true
            ),
            array(
                'title' => '青マーカー',
                'inline' => 'span',
                'classes' => 'blue-marker',
                'wrapper' => true
            ),
            array(
                'title' => '黄マーカー',
                'inline' => 'span',
                'classes' => 'yellow-marker',
                'wrapper' => true
            ),
            array(
                'title' => '緑マーカー',
                'inline' => 'span',
                'classes' => 'green-marker'
            ),
            array(
                'title' => '普通ボックス',
                'block' => 'div',
                'classes' => 'normal-box',
                'wrapper' => true,
                'merge_siblings' => false
            ),
            array(
                'title' => '黄ボックス',
                'block' => 'div',
                'classes' => 'yellow-box',
                'wrapper' => true,
                'merge_siblings' => false
            ),
            array(
                'title' => 'infoボックス',
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

function count_title_characters() {?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            //in_selの文字数をカウントしてout_selに出力する
            function count_characters(in_sel, out_sel) {

                $(out_sel).html( $(in_sel).val().length );

                if( $(in_sel).val().length >= '32' ) {
                    $(out_sel).css("color","red");
                } else {
                    $(out_sel).css("color", "#666");
                }
            }

            //ページ表示に表示エリアを出力
            $('#titlewrap').after('<div style="position:absolute;top:-24px;right:0;background-color:#f7f7f7;padding:1px 2px;border-radius:5px;border:1px solid #ccc;">文字数<span class="wp-title-count" style="margin-left:5px;">0</span></div>');

            //ページ表示時に数える
            count_characters('#title', '.wp-title-count');

            //入力フォーム変更時に数える
            $('#title').bind("keydown keyup keypress change",function(){
                count_characters('#title', '.wp-title-count');
            });

        });
    </script><?php
}
add_action( 'admin_head-post-new.php', 'count_title_characters' );
add_action( 'admin_head-post.php', 'count_title_characters' );
?>
