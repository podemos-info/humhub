<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AdminModule.modules', '<strong>Modules</strong> directory'); ?></div>
    <div class="panel-body">

        <?php echo $this->renderPartial('_header'); ?>
        <br/>

        <h1><?php echo Yii::t('AdminModules.modules', '<strong>Currently</strong> installed modules'); ?></h1>
        <?php foreach ($installedModules as $moduleId => $module) : ?>
            <div class="media">
                <img class="media-object img-rounded pull-left" data-src="holder.js/64x64" alt="64x64"
                     style="width: 64px; height: 64px;"
                     src="<?php echo $module->getImage(); ?>">

                <div class="media-body">
                    <h4 class="media-heading"><?php echo $module->getName(); ?>
                        <small>
                            <?php if ($module->isEnabled()) : ?>
                                <span
                                    class="label label-success"><?php echo Yii::t('AdminModules.modules', 'Activated'); ?></span>
                            <?php endif; ?>
                        </small>
                    </h4>

                    <p><?php echo $module->getDescription(); ?></p>

                    <div class="module-controls">

                        <?php echo Yii::t('AdminModules.modules', 'Version:'); ?> <?php echo $module->getVersion(); ?>

                        <?php if ($module->isEnabled()) : ?>
                            &middot; <?php echo HHtml::postLink(Yii::t('AdminModule.modules', 'Disable'), array('//admin/module/disable', 'moduleId' => $moduleId), array('confirm' => Yii::t('AdminModule.modules', 'Are you sure? *ALL* module data will be lost!'))); ?>

                            <?php if ($module->getConfigUrl()) : ?>
                                &middot; <?php echo HHtml::link(Yii::t('AdminModule.modules', 'Configure'), $module->getConfigUrl()); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            &middot; <?php echo HHtml::postLink(Yii::t('AdminModule.modules', 'Enable'), array('//admin/module/enable', 'moduleId' => $moduleId)); ?>
                        <?php endif; ?>

                        <?php if (Yii::app()->moduleManager->canUninstall($moduleId)): ?>
                            &middot; <?php echo HHtml::postLink(Yii::t('AdminModule.modules', 'Uninstall'), array('//admin/module/uninstall', 'moduleId' => $moduleId), array('confirm' => Yii::t('AdminModule.modules', 'Are you sure? *ALL* module related data and files will be lost!'))); ?>
                        <?php endif; ?>

                        &middot; <?php echo HHtml::link(Yii::t('AdminModule.modules', 'More info'), array('//admin/module/info', 'moduleId' => $moduleId), array('data-target' => '#globalModal', 'data-toggle' => 'modal')); ?>

                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>