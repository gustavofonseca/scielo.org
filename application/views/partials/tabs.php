<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php 
foreach ($this->TabGroup->get_groups() as $key => $group) :
    $tabs = $this->TabGroup->get_tabs($group);
?>
<section>
    <div class="row row-tab-desk">
        <div class="col-md-12 nav-center">
            <ul class="nav nav-tabs">
                <?php foreach ($tabs as $tab) : ?>
                <li <?php if ($tab->is_active()) : ?>class="active"<?php endif; ?>>
                    <h2><a  href="#<?= $tab->get_id() ?>" data-toggle="tab"><?= $tab->get_title() ?></a></h2>
                </li>
                <?php endforeach; ?>
                <!-- Youtube videos is static, so it's not coming from the backend -->
                <?php if ($key == 1) : ?>
                <li>
                    <h2><a  href="#tab-youtube-videos" data-toggle="tab">YouTube</a></h2>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="tab-content clearfix">
        <?php foreach ($tabs as $tab) : ?>
        <div class="row row-tab-mobile">
            <div class="col-xs-12">
                <h2><a href="#<?= $tab->get_id() ?>" data-toggle="tab" class="btn btn-tab-mobile active"><?= $tab->get_title() ?></a></h2>
            </div>
        </div>
        
        <div class="tab-pane <?php if ($tab->is_active()) : ?>active<?php endif; ?> <?php if ($tab->get_content_type() == 4 || $tab->get_content_type() == 5) : ?>tab-pane-white<?php endif; ?>" id="<?= $tab->get_id() ?>">
            <?php 
            $this->load->vars('tab', $tab);
            $this->load->view($tab->get_content());
            ?>
        </div>
        <?php endforeach; ?>    
         <!-- Youtube videos is static, so it's not coming from the backend --> 
         <?php if ($key == 1) : ?>
            <div class="row row-tab-mobile">
                <div class="col-xs-12">
                    <h2><a href="#tab-youtube-videos" data-toggle="tab" class="btn btn-tab-mobile active">YouTube</a></h2>
                </div>
            </div>
            
            <div class="tab-pane tab-pane-white" id="tab-youtube-videos">
                <?php 
                $this->load->view('partials/youtube-videos');
                ?>
            </div>    
        <?php endif; ?>   
    </div>
</section>
<?php endforeach; ?>
