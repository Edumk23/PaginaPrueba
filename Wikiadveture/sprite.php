<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slime Saltando</title>
<style>
  #slime {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>
</head>
<body>
<img id="slime" src="sprite/slime.gif" alt="Slime" width="50" height="50">

<script>
  const slime = document.getElementById('slime');
  let posX = 0;
  let posY = 0;
  let jumping = false;

  function moveSlime() {
    slime.style.transform = `translate(${posX}px, ${posY}px)`;
  }

  function jump() {
    if (!jumping) {
      jumping = true;
      let jumpHeight = 50; // Altura del salto
      let jumpSpeed = 2; // Velocidad de ascenso
      let gravity = 1; // Gravedad
      let jumpInterval = setInterval(() => {
        if (jumpHeight > 0) {
          posY -= jumpSpeed;
          jumpHeight -= jumpSpeed;
        } else {
          clearInterval(jumpInterval);
          let fallInterval = setInterval(() => {
            if (posY < 0) {
              posY += gravity;
            } else {
              posY = 0;
              clearInterval(fallInterval);
              jumping = false;
            }
            moveSlime();
          }, 10);
        }
        moveSlime();
      }, 10);
    }
  }

  document.addEventListener('keydown', (event) => {
    const speed = 5; // Velocidad de movimiento
    switch (event.key) {
      case 'ArrowUp':
        jump();
        break;
      case 'ArrowDown':
        posY += speed;
        break;
      case 'ArrowLeft':
        posX -= speed;
        break;
      case 'ArrowRight':
        posX += speed;
        break;
    }
    moveSlime();
  });
</script>
</body>
</html>
