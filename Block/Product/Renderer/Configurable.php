<?php
namespace MageSuite\ServerSideSwatches\Block\Product\Renderer;

class Configurable extends \Magento\Swatches\Block\Product\Renderer\Configurable
{
    const SWATCH_RENDERER_TEMPLATE = 'MageSuite_ServerSideSwatches::product/view/renderer.phtml';

    public function getSwatchProductImage(\Magento\Catalog\Model\Product $childProduct, $imageType)
    {
        $imgUrl = parent::getSwatchProductImage($childProduct, $imageType);
        if ($imgUrl !== null) {
            return $imgUrl;
        }
        return '';
    }

    protected function getRendererTemplate()
    {
        return $this->isProductHasSwatchAttribute() ?
            self::SWATCH_RENDERER_TEMPLATE : self::CONFIGURABLE_RENDERER_TEMPLATE;
    }

    protected function getCacheLifetime()
    {
        return \Magento\Framework\View\Element\AbstractBlock::getCacheLifetime() ?? 3600;
    }
}
