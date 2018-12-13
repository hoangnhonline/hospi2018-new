<?php if(!empty($module->amenities)){ ?>
		<ul class="row noneStyle block-Convenient-details">

            <?php foreach($module->amenities as $amt){ if(!empty($amt->name)){ ?>
            
			<li class="col-sm-4 col-xs-6">
        <img class="go-right" src="<?php echo $amt->icon;?>" width="40px">
        <span class="text-left go-text-right size14"><?php echo $amt->name; ?></span>
    </li>

            <?php } } ?>
	</ul>

<?php } ?>
<style>
    .noneStyle li {
        list-style-type: none;
    }
    .block-Convenient-details li img {
        width: 40px !important;
        height: auto;
    }
    @media (max-width: 768px) {
        .noneStyle li {
            text-align: center;
            margin-bottom: 10px;
        }
        .block-Convenient-details li img {
            height: auto;
            display: block;
            margin: 0 auto;
			width:70%
        }
    }
	@media (max-width: 375px) {
        .datepicker.dropdown-menu{
			margin-left:67px;
		}
    }
	
</style>