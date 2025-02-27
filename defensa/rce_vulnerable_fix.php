<?php
if (isset($_GET['cmd'])) {
    $allowed_commands = ['ls', 'whoami', 'uptime'];
    $cmd = $_GET['cmd'];

    if (in_array($cmd, $allowed_commands)) {
        $output = shell_exec(escapeshellcmd($cmd));
        echo "<pre>" . htmlspecialchars($output, ENT_QUOTES, 'UTF-8') . "</pre>";
    } else {
        echo "Comando no permitido.";
    }
}
?>
