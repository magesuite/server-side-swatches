<?php

declare(strict_types=1);

namespace MageSuite\ServerSideSwatches\Plugin\Magento\ConfigurableProduct\Block\Product\View\Type\Configurable;

class AddProductName
{
    public function __construct(
        protected \Magento\Framework\Registry $registry,
        protected \Magento\Framework\Serialize\Serializer\Json $serializer,
    ) {
    }

    public function afterGetJsonConfig(
        \Magento\ConfigurableProduct\Block\Product\View\Type\Configurable $subject,
        string $jsonConfig
    ): string {
        $jsonConfig = $this->serializer->unserialize($jsonConfig);
        $jsonConfig['product_name'] = $subject->getProduct()->getName();
        return $this->serializer->serialize($jsonConfig);
    }
}
