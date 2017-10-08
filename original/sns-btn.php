<ul style="margin-top: 15px; margin-bottom: 15px;" id="sns_btn">

    <li class="sns_btnInner"><a class="twitter" href="http://twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&amp;<?php echo urlencode(get_permalink()); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Twitterで共有"><i style="color: white; margin-right:7px;"class="fa fa-twitter"></i>Twitter</a></li>

    <li class="sns_btnInner"><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&amp;t=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" title="facebookで共有"><i style="color: white; margin-right:7px;"class="fa fa-facebook"></i>facebook</a></li>

    <li class="sns_btnInner"><a class="google_plus" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Google+で共有"><i style="color: white; margin-right:7px;"class="fa fa-google-plus"></i>Google+</a></li>

    <li class="sns_btnInner"><a class="hatena" href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" data-hatena-bookmark-title="<?php the_permalink(); ?>" title="このエントリーをはてなブックマークに追加"><span style="color: white; margin-right:7px;">B!</span>はてブ</a></li>

    <li class="sns_btnInner"><a class="pocket" href="http://getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="pocketで共有"><i style="color: white; margin-right: 6px;" class="fa fa-get-pocket" aria-hidden="true"></i>pocket</a></li>

    <li class="sns_btnInner"><a class="feedly" href="https://feedly.com/i/subscription/feed/https://takuyab.com/feed/" target="_blank" title="Feedlyで定期購読">Feedly</a></li>

</ul>