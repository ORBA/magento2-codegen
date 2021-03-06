{{ include(template_from_string(headerPHP)) }}
namespace {{ vendorName|pascal }}\{{ moduleName|pascal }}\Queue;

use Magento\Framework\DataObject;
use {{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data\{{ topic|pascal }}RequestInterface;

class {{ topic|pascal }}Request extends DataObject implements {{ topic|pascal }}RequestInterface
{
{% for item in requestFields %}

    public function get{{ item.name|pascal }}(): ?{{ item.type }}
    {
        return $this->getData('{{ item.name|snake }}');
    }

    public function set{{ item.name|pascal }}({{ item.type }} $value): void
    {
        $this->setData('{{ item.name|snake }}', $value);
    }
{% endfor %}
}
