<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Count
 *
 * @author christ
 */
class Count {
    private function stripComments($line) {
        $line = preg_replace('/\s*\/\/.*/', '', $line);// Doppelslash
        $line = preg_replace('/\/\*[\s\S]*?\*\//', '', $line);// Block Quote
        $line = preg_replace('/\n\s*\n/', "\n", $line);// leere Zeilen
        return $line;
    }

    public function countLines(array $code) {
        if(empty($code)) return 0;
        $completeCode = $this->stripComments(implode("\n", $code));
        $codeArray = explode("\n", $completeCode);
        return count($codeArray);
    }
}

?>
