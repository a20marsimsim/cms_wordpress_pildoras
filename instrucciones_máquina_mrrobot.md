## Al no conseguir instalar algunas de las versiones vulnerables de WordPress (y sus softwares necesarios; PHP, MySQL, Apache2...), hemos decidido usar una máquina ya existente de un Capture The Flag de TryHackMe

# Instrucciones para acceder a la máquina y modificar WordPress

En este caso, hemos resuelto el CTF de TryHackMe "robot" para poder modificar las configuraciones de WordPress en la máquina. A continuación, te detallamos los pasos a seguir para acceder a la máquina y obtener privilegios elevados.

## Pasos para acceder a la máquina:

1. **Acceder a TryHackMe:**
   - Inicia sesión en tu cuenta de TryHackMe.

2. **Conectar con la red de TryHackMe:**
   - Descarga el archivo de configuración de OpenVPN desde la plataforma de TryHackMe.

3. **Conexión mediante OpenVPN:**
   - Ejecuta el siguiente comando para conectar con la red de TryHackMe:
     ```bash
     sudo openvpn archivo.ovpn
     ```

4. **Acceder al CTF:**
   - Navega a [https://tryhackme.com/room/mrrobot](https://tryhackme.com/room/mrrobot).

5. **Iniciar la máquina:**
   - Inicia la máquina desde el panel de TryHackMe y espera a que se cargue la dirección IP de la máquina.

6. **Acceder al panel de WordPress:**
   - Entra en `http://IP/wp-admin` usando las siguientes credenciales:
     - Usuario: `elliot`
     - Contraseña: `ER28-0652`

## Modificación de la máquina para explotar vulnerabilidades:

A partir de este punto, puedes comenzar a modificar o añadir vulnerabilidades en la máquina. Para obtener acceso al servidor Linux y conseguir privilegios de root, sigue estos pasos:

7. **Acceder al archivo 404.php:**
   - En el panel de administración de WordPress, navega a `Templates > Editor > 404.php`.

8. **Añadir un reverse shell:**
   - Borra todo el contenido del archivo `404.php` y añade el código del reverse shell disponible en [GitHub](https://github.com/a20marsimsim/cms_wordpress_pildoras/blob/main/ataque/reverse_shell.php).
   - Asegúrate de editar la IP para que coincida con la de tu interfaz de VPN.

9. **Escuchar en tu máquina:**
   - Ejecuta el siguiente comando en tu sistema para escuchar en el puerto 1234:
     ```bash
     nc -lvnp 1234
     ```

10. **Ejecutar el reverse shell:**
    - Dirígete a `http://IP_VICTIMA/404.php` para ejecutar el reverse shell. Esto abrirá una shell en tu terminal con el usuario `daemon` en el servidor de la víctima.

11. **Obtener una terminal interactiva:**
    - Ejecuta el siguiente comando en tu terminal para obtener una shell con `/bin/bash`:
      ```bash
      python3 -c 'import pty; pty.spawn("/bin/bash")'
      ```

12. **Acceder al usuario "robot":**
    - Conéctate al usuario `robot` ejecutando:
      ```bash
      su robot
      ```
      - Contraseña: `abcdefghijklmnopqrstuvwxyz`

13. **Obtener acceso root:**
    - Una vez dentro del usuario `robot`, ve al directorio raíz y ejecuta `nmap` de la siguiente manera:
      ```bash
      nmap --interactive
      ```
    - Esto abrirá un diálogo donde escribirás `!sh`. Tras esto, obtendrás una shell con el usuario `root`.

## Resumen del CTF

Para obtener más detalles sobre cómo se resolvió el CTF, puedes consultar el siguiente [writeup en PDF](https://github.com/a20marsimsim/cms_wordpress_pildoras/blob/main/writeup_mrrobot.pdf).
