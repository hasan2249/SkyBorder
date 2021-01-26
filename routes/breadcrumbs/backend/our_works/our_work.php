<?php

Breadcrumbs::for('admin.our_works.index', function ($trail) {
    $trail->push(__('labels.backend.access.pages.management'), route('admin.our_works.index'));
});

Breadcrumbs::for('admin.our_works.create', function ($trail) {
    $trail->parent('admin.our_works.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.our_works.create'));
});

Breadcrumbs::for('admin.our_works.edit', function ($trail, $id) {
    $trail->parent('admin.our_works.index');
    $trail->push(__('labels.backend.access.pages.management'), route('admin.our_works.edit', $id));
});
