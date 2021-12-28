<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
?>

<?php if(is_array($list) && !empty($list)) :?>

<ul class="categories">
    <?php foreach($list as $parent=>$item) :?>
        <?php if(!empty($item['next']) && is_array($item['next'])) :?>

            <li><strong><?php echo $item['name']?></strong></li>
            <ul>
                <?php foreach($item['next'] as $child) :?>
                    <li>-
                        <a href="<?php echo Route::_(BoardRoute::getCategoryRoute($child['id'] . ':' . $child['alias']));?>">
                            <?php echo $child['name'];?>
                        </a>
                    </li>
                <?php endforeach;?>
        <?php endif;?>
    <?php endforeach;?>
</ul>
<?php endif;?>


