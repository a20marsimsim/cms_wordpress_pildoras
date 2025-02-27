# Al no conseguir instalar algunas de las versiones vulnerables de WordPress (y sus softwares necesarios; PHP, MySQL, Apache2...), hemos decidido usar una máquina ya existente de un Capture The Flag de TryHackMe ->
# El Capture The Flag en cuestión es robot, hemos resuelto el CTF para poder acceder a la máquina y modificar a nuestro gusto las configuraciones de WordPress.

# Para acceder a esta máquina se deben seguir los siguientes pasos:
# 1. Entrar en nuestra cuenta de TryHackMe
# 2. Descargar el archivo de configuración de OpenVPN para conectarnos a la red de TryHackMe
# 3. Ejecutar con "sudo openvpn archivo.ovpn"
# 4. Navegar a https://tryhackme.com/room/robot
# 5. Iniciar la máquina y esperar a que cargue la dirección IP de esta
# 6. Entrar a http://IP/wp-admin y usar las credenciales "elliot" - "ER28-0652" (sin las dobles comillas)

# A partir de aquí ya tenemos más que suficiente para añadir o arreglar las vulnerabilidades que podamos, pero para acceder al servidor Linux y conseguir usuario root haremos lo siguiente:
# 7. En el panel de WordPress, iremos a Templates > Editor > 404.php
# 8. Borraremos todo lo que hay en este archivo y añadiremos el reverse shell de https://github.com/a20marsimsim/cms_wordpress_pildoras/blob/main/ataque/reverse_shell.php y editaremos la IP para poner la de nuestra interfaz de la VPN
# 9. Ejecutaremos en nuestro sistema el comando "nc -lvnp 1234" e iremos a http://IP_VICTIMA/404.php
# 10. Una vez hecho esto, en la terminal donde hemos ejecutado el comando "nc -lvnp 1234" obtendremos una shell con el usuario daemon en el servidor de la "víctima"
# 11. Antes de nada, ejecutaremos este comando para obtener una terminal con /bin/bash: "python3 -c 'import pty; pty.spawn("/bin/bash")'". Ahora nos conectaremos al usuario "robot" con "su robot" y con la contraseña "abcdefghijklmnopqrstuvwxyz"
# 12. Una vez estemos dentro del usuario "robot" iremos al directorio raíz y ejecutaremos "nmap --interactive", nos aparecerá un "dialogo" donde escribiremos "!sh", tras escribir esto, obtendremos una shell con el usuario "root".


# Para conseguir todo esto hemos resuelto el CTF de la siguiente manera: https://github.com/a20marsimsim/cms_wordpress_pildoras/blob/main/writeup_mrrobot.pdf
