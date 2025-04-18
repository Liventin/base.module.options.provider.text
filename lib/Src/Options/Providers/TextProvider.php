<?php
namespace Base\Module\Src\Options\Providers;

use Base\Module\Src\Options\Interface\OptionProvider;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Config\Option;

class TextProvider implements OptionProvider
{
    private string $placeholder = '';
    private int $size = 50;

    public function getType(): string
    {
        return 'text';
    }

    /** @noinspection HtmlDeprecatedAttribute */
    public function render(array $option, string $moduleId): string
    {
        $value = Option::get($moduleId, $option['id'], $option['params']['default'] ?? '');
        $html = '<tr>';
        $html .= '<td class="adm-detail-content-cell-l" width="50%">' . htmlspecialcharsbx($option['name']) . ':</td>';
        $html .= '<td class="adm-detail-content-cell-r" width="50%">';
        $html .= '<input type="text" name="' . htmlspecialcharsbx($option['id']) . '" value="' . htmlspecialcharsbx($value) . '"';
        $html .= ' size="' . (int)($option['params']['size'] ?? $this->size) . '"';
        if (!empty($option['params']['placeholder'] ?? $this->placeholder)) {
            $html .= ' placeholder="' . htmlspecialcharsbx($option['params']['placeholder'] ?? $this->placeholder) . '"';
        }
        $html .= '>';
        $html .= '</td>';
        $html .= '</tr>';
        return $html;
    }

    /**
     * @throws ArgumentOutOfRangeException
     */
    public function save(array $option, string $moduleId, mixed $value): void
    {
        if (is_string($value)) {
            Option::set($moduleId, $option['id'], $value);
        }
    }

    public function setPlaceholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function getParamsToArray(): array
    {
        return [
            'placeholder' => $this->placeholder,
            'size' => $this->size,
        ];
    }
}
