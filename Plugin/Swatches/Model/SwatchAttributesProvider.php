<?php
namespace Dfe\Mediaclip\Plugin\Swatches\Model;
use Magento\Catalog\Model\Product;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable as C;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable\Attribute;
use Magento\Swatches\Model\SwatchAttributesProvider as Sb;
use Mediaclip\Hub\Configurable\Model\Product\Type\MediaclipConfigurable as MC;
// 2018-03-07
// https://www.upwork.com/d/contracts/19666606
// «The module not support image swatch».
final class SwatchAttributesProvider {
	/**
	 * 2018-03-07
	 * @see \Magento\Swatches\Model\SwatchAttributesProvider::provide()
	 * https://github.com/magento/magento2/blob/2.2.3/app/code/Magento/Swatches/Model/SwatchAttributesProvider.php#L45-L71
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param Product $p
	 * @return Attribute[]
	 */
	function aroundProvide(Sb $sb, \Closure $f, Product $p) {
		if ($isMC = MC::TYPE_CODE === $p->getTypeId() /** @var bool $isMC */) {
			/**
			 * 2018-03-07
			 * I intentionally do not use @see \Magento\Catalog\Model\Product::setTypeId()
			 * because of its custom logic:
			 * https://github.com/magento/magento2/blob/2.2.3/app/code/Magento/Catalog/Model/Product.php#L2501-L2513
			 */
			$p[Product::TYPE_ID] = C::TYPE_CODE;
		}
		try {$r = $f($p); /** @var Attribute[] $r */}
		finally {if ($isMC) {$p[Product::TYPE_ID] = MC::TYPE_CODE;}}
		return $r;
	}
}

