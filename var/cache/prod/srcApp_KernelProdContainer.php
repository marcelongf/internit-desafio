<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLyVI9nx\srcApp_KernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLyVI9nx/srcApp_KernelProdContainer.php') {
    touch(__DIR__.'/ContainerLyVI9nx.legacy');

    return;
}

if (!\class_exists(srcApp_KernelProdContainer::class, false)) {
    \class_alias(\ContainerLyVI9nx\srcApp_KernelProdContainer::class, srcApp_KernelProdContainer::class, false);
}

return new \ContainerLyVI9nx\srcApp_KernelProdContainer([
    'container.build_hash' => 'LyVI9nx',
    'container.build_id' => 'b4aa7381',
    'container.build_time' => 1580355320,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLyVI9nx');