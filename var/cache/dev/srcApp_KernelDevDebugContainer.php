<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerSCixXsI\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerSCixXsI/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerSCixXsI.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerSCixXsI\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerSCixXsI\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'SCixXsI',
    'container.build_id' => '494d2ecf',
    'container.build_time' => 1580368011,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerSCixXsI');
