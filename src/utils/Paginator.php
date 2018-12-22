<?php

namespace TaskBook\Utils;

use JasonGrimes\Paginator as VendorPaginator;

class Paginator extends VendorPaginator
{
    public function toHtml()
    {
        if ($this->numPages <= 1) {
            return '';
        }

        $html = '<ul class="pagination justify-content-center">';
        $html .= "\n";
        if ($this->getPrevUrl()) {
            $html .= '<li class="page-item"><a class="page-link" href="' . htmlspecialchars($this->getPrevUrl()) . '">' . $this->previousText . '</a></li>';
            $html .= "\n";
        }

        foreach ($this->getPages() as $page) {
            if ($page['url']) {
                $html .= '<li' . ($page['isCurrent'] ? ' class="page-item active"' : ' class="page-item"') . '><a class="page-link" href="' . htmlspecialchars($page['url']) . '">' . htmlspecialchars($page['num']) . '</a></li>';
            } else {
                $html .= '<li class="disabled"><span>' . htmlspecialchars($page['num']) . '</span></li>';
            }
            $html .= "\n";
        }

        if ($this->getNextUrl()) {
            $html .= '<li class="page-item"><a class="page-link" href="' . htmlspecialchars($this->getNextUrl()) . '">' . $this->nextText . '</a></li>';
            $html .= "\n";
        }
        $html .= '</ul>';
        $html .= "\n";

        return $html;
    }
}
