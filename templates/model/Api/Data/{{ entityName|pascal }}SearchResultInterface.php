{{ include(template_from_string(headerPHP)) }}
namespace {{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface {{ entityName|pascal }}SearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \{{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data\{{ entityName|pascal }}Interface[]
     */
    public function getItems();

    /**
     * @param \{{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data\{{ entityName|pascal }}Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
