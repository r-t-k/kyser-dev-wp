<?php
$services = 'services';
new_group($services, 'Services', 'page_template', '==', 'page-templates/home.php', 1);
$service_repeater = new_repeater($services, 'services_repeater', 'Service Content');
$title = build_text('srv_title', 'Title', 'srv-title');
$desc_repeater = new_repeater($services, 'desc_repeater', 'Service Description', true);
$desc = build_text('srv_desc', 'Description', 'srv-desc');
$desc_repeater->import_field($desc);
$service_repeater->import_field($title);
$service_repeater->import_field($desc_repeater->export());
$service_repeater->build();
