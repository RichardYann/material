<?php 
if ($this->options->langis == '0') {
    require_once(dirname(__FILE__) . '/lang/en-us.php');
} elseif ($this->options->langis == '1') {
    require_once(dirname(__FILE__) . '/lang/zh-cn.php');
} elseif ($this->options->langis == '2') {
    require_once(dirname(__FILE__) . '/lang/zh-tw.php');
}
$MultiLang = new LangDict();
?>


<!-- SideBar Using MDUI Begin-->

<div class="mdui-drawer mdui-drawer-full-height mdui-shadow-6 drawer-mod sidebar <?php if (!in_array('DarkTheme', $this->options->FunctionSwitch)) { echo 'mdui-color-white'; } else { echo 'mdui-color-grey-800'; } ?>" id="sidebar">

    <!--SideBar Header Begin-->
    <div class="sidebar-header header-cover" style="background-image: url(<?php $this->options->themeUrl() ?>img/sidebarheader.jpg );">

        <!-- Sidebar brand image -->
        <div class="sidebar-image mdui-valign">
            <?php if (!empty($this->options->avatarURL)): ?>
                    <img src="<?php $this->options->avatarURL() ?>">
            <?php else: ?>
                <?php if (!empty($this->options->Logo)): ?>
                    <img src="<?php $this->options->Logo() ?>">
                <?php else: ?>
                    <?php if (!empty($this->options->CDNURL)): ?>
                        <img src="<?php $this->options->CDNURL() ?>/MaterialCDN/img/Avatar.jpg">
                    <?php else: ?>
                        <img src="<?php $this->options->themeUrl('img/Avatar.jpg') ?>">
                        
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <a href="<?php $this->options->siteUrl(); ?>" target="_self" class="mdui-typo mdui-text-color-white sidebar-title">
                <?php $this->options->title(); ?>
            </a>
            
            <i class="sidebar-brand mdui-collapse-item-arrow mdui-icon material-icons mdui-ripple mdui-text-color-white-icon" id="sidebar-header-collapse-controller" >arrow_drop_down</i>
        </div>

        

    </div>
    <!--SideBar Header End-->



    <!-- Sidebar Dropdown Menu Begin -->
    <div class="mdui-collapse"  id="sidebar-header-collapse" >
        <div class="mdui-collapse-item"  id="sidebar-header-collapse-item" >

            <!--Content Show When Clicking Arrow On the SideBar Header-->
            <div class="mdui-collapse-item-body">
                <ul class="mdui-list mdui-list-dense" >

                    <?php if ($this->user->hasLogin()): ?>

                        <li class="mdui-list-item mdui-ripple" >
                            <a href="<?php $this->options->adminUrl(); ?>" class="mdui-list-item-content" tabindex="-1">
                                <i class="mdui-icon material-icons">account_circle</i>
                                <?php echo $MultiLang->get('Profile'); ?>
                            </a>
                        </li>

                        <li class="mdui-list-item mdui-ripple" >
                            <a href="<?php $this->options->adminUrl('options-theme.php'); ?>" class="mdui-list-item-content" tabindex="-1">
                                <i class="mdui-icon material-icons">settings</i>
                                <?php echo $MultiLang->get('Settings'); ?>
                            </a>
                        </li>

                        <li class="mdui-list-item mdui-ripple" >
                            <a href="<?php $this->options->logoutUrl(); ?>" class="mdui-list-item-content" tabindex="-1">
                                <i class="mdui-icon material-icons">exit_to_app</i>
                                <?php echo $MultiLang->get('Logout'); ?>
                            </a>
                        </li>

                        <?php else: ?>

                        <li class="mdui-list-item mdui-ripple" >
                            <a href="<?php $this->options->loginUrl(); ?>" class="mdui-list-item-content" tabindex="-1">
                                <i class="mdui-icon material-icons">fingerprint</i>

                                <?php echo $MultiLang->get('Login'); ?>
                            </a>
                        </li>

                        <li class="mdui-list-item mdui-ripple" >
                            <a href="<?php $this->options->adminUrl('register.php'); ?>" class="mdui-list-item-content" tabindex="-1">
                                <i class="mdui-icon material-icons">person_add</i>
                                <?php echo $MultiLang->get('Register'); ?>
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <!--SideBar Dropdown Menu End-->

    <!--Sidebar Main Content Begin -->
    <div class="mdui-list">

        <!-- Homepage -->
        <a href="<?php $this->options->siteUrl(); ?>" class="mdui-list-item mdui-ripple mdui-text-color-theme-text" >
            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">home</i>
            <div class="mdui-list-item-content">
                <?php  echo $MultiLang->get('Homepage'); ?>
            </div>
        </a>   

        <!--Archive Dropdown Begin-->
        <div class="mdui-collapse" mdui-collapse="{ accordion: true}">
            <div class="mdui-collapse-item">
                <li class="mdui-collapse-item-header mdui-list-item">

                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">inbox</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-text" >
                        <?php  echo $MultiLang->get('Archive'); ?>
                        </div>
                        <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-ripple mdui-text-color-theme-text"  >keyboard_arrow_down</i>

                </li>

                <div class="mdui-collapse-item-body">
                    <ul class="mdui-list mdui-list-dense">
                        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                        ->parse('
                                    <li class="mdui-list-item mdui-ripple" >
                                        <a href="{permalink}" class="mdui-list-item-content mdui-text-color-theme-secondary">
                                                {date}
                                        </a>
                                    </li>
                                '); ?>
                    </ul>

                </div>
            </div>
        </div>
        <!--Arichive dropdown End-->

        <!--Category Dropdown Begin-->
        <div class="mdui-collapse" mdui-collapse="{ accordion: true}">
            <div class="mdui-collapse-item">
                <li class="mdui-collapse-item-header mdui-list-item">

                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text">apps</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-text" >
                            <?php  echo $MultiLang->get('Categories'); ?>
                        </div>
                        <i class="mdui-collapse-item-arrow mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-text mdui-ripple"  >keyboard_arrow_down</i>

                </li>

                <div class="mdui-collapse-item-body">
                    <ul class="mdui-list mdui-list-dense" for="show-category-button">
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while ($category->next()): ?>
                            <li class="mdui-list-item mdui-ripple">
                                <a href="<?php $category->permalink(); ?>" class="mdui-list-item-content mdui-text-color-theme-secondary" title="<?php $category->name(); ?>">
                                    <?php $category->name(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--Category Dropdown End -->

        <li class="mdui-divider"></li>

		<!-- Show Pages -->
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while ($pages->next()): ?>
            <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" class="mdui-list-item mdui-text-color-theme-text mdui-ripple">
                <div class="mdui-list-item-content">
                    <?php $pages->title(); ?>
                </div>
            </a>
        <?php endwhile; ?>

        <?php if (!defined('__TYPECHO_ROOT_DIR__')) {exit;}
              Typecho_Widget::widget('Widget_Stat')->to($stat);
            ?>

        <!-- Status Page -->
        <?php if (!($this->options->Status == '')): ?>
            <li class="mdui-list-item">
                <a href="<?php $this->options->Status(); ?>" class="mdui-list-item-content mdui-text-color-theme-text">
                <?php  echo $MultiLang->get('Status'); ?>
                </a>
            </li>
        <?php endif; ?>

        <li class="mdui-divider"></li>
    </div>

        <!-- Article Numebr  -->
            <div class="mdui-list-item">
                <span class="mdui-list-item-content mdui-text-color-theme-text">
                    <?php  echo $MultiLang->get('Article Number'); ?>
                    
                </span>
                <span class="mdui-list-item-avatar mdui-color-theme"><?php echo $stat->publishedPostsNum;?></span>
            </div>


		

	


	<!-- Sidebar bottom text -->
    <a href="https://github.com/manyang901/material" target="_blank" rel="noopener" class="mdui-list mdui-list-item mdui-m-b-5">
        <div class="mdui-list-item-content mdui-text-color-pink-accent">
            <?php  echo $MultiLang->get('Theme'); ?>
            - New Material
        </div>
    </a>


    <?php if (!empty($this->options->switch) && in_array('ShowUpyun', $this->options->switch)) : ?>
        <div id="upyun-logo">
            <a href="https://www.upyun.com/" target="_blank">
                <?php if (!empty($this->options->CDNURL)): ?>
                <img src="<?php $this->options->CDNURL() ?>/MaterialCDN/img/upyun_logo.jpg" width="103px" height="45px" />
                <?php else: ?>
                <img src="<?php $this->options->themeUrl('img/upyun_logo.jpg'); ?>" width="103px" height="45px" />
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>


</div>
