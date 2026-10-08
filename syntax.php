<?php

if (!defined('DOKU_INC')) die();

/** Display a cached summary of classified wiki pages. */
class syntax_plugin_pagehealth extends DokuWiki_Syntax_Plugin
{
    public function getType()
    {
        return 'substition';
    }

    public function getPType()
    {
        return 'normal';
    }

    public function getSort()
    {
        return 230;
    }

    public function connectTo($mode)
    {
        if ($mode === 'base') {
            $this->Lexer->addSpecialPattern('~~PAGEHEALTH~~', $mode, 'plugin_pagehealth');
        }
    }

    public function handle($match, $state, $pos, Doku_Handler $handler)
    {
        return [];
    }

    public function render($format, Doku_Renderer $renderer, $data)
    {
        if ($format !== 'xhtml') return false;

        $renderer->doc .= '<span class="plugin_pagehealth_summary" data-pagehealth-summary data-error="' .
            hsc($this->getLang('summary_unavailable')) . '">' .
            hsc($this->getLang('summary_loading')) .
            '</span>';
        return true;
    }
}
