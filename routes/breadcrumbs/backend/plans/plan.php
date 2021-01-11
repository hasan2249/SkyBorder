<?php

Breadcrumbs::for('admin.plans.index', function ($trail) {
    $trail->push(__('labels.backend.access.pages.management'), route('admin.plans.index'));
});

Breadcrumbs::for('admin.plans.create', function ($trail) {
    $trail->parent('admin.plans.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.plans.create'));
});

Breadcrumbs::for('admin.plans.edit', function ($trail, $id) {
    $trail->parent('admin.plans.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.plans.edit', $id));
});
