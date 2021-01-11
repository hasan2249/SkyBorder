<?php

Breadcrumbs::for('admin.services.index', function ($trail) {
    $trail->push(__('labels.backend.access.pages.management'), route('admin.services.index'));
});

Breadcrumbs::for('admin.services.create', function ($trail) {
    $trail->parent('admin.services.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.services.create'));
});

Breadcrumbs::for('admin.services.edit', function ($trail, $id) {
    $trail->parent('admin.services.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.services.edit', $id));
});
