<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<div>
	<div id="lists">
		
		<div class="cmall-list">

            <?php 
                if(count($view['data']['list'])>0){
                    foreach($view['data']['list'] as $k=>$v){
                        ?>
                        <div style="border-top:solid 1px black; padding:20px;">
                            <div style="padding:5px;">날짜 : <?php echo substr($v['poi_datetime'],0,10);?></div>
                            <div style="padding:5px;">내용 : <?php echo $v['poi_content'];?></div>
                            <div style="padding:5px;">코인 : <?php echo $v['poi_point'];?></div>
                        </div>
                        <?php
                    }
                }else{
                    echo "내역이 없습니다.";
                }
            ?>
		</div>
	
		
	</div>
</div>
<script type="text/javascript">

</script>

<nav><?php echo element('paging', $view); ?></nav>
