Welcome to StackEdit!
===================

- instalar o [Arduino](http://arduino.cc/download_handler.php?f=/arduino-1.6.0-windows.exe)
- instalar o [Repetier](http://www.repetier.com/download-software/)

----------


Arduino
-------------

É a IDE de desenvolvimento da placa da impressora, é interessante instalar pois já instala os drivers para reconhecer a USB dela.

[Ve esse link para ver as tretas pra instalar](http://www.paulotrentin.com.br/programacao/instalando-arduino-no-windows-7/)



Repetier
-------------

Esse é o programa maroto pra "comandar" a impressora


Vamos configurar


####Conexão
![enter image description here](http://i.imgur.com/B1o0oBB.jpg)

- Seleciona a porta , no teu caso vai ficar como COM1, COM2... etc
- Taxa de transmissão : 115200

####Impressora
![enter image description here](http://i.imgur.com/SB3Fvkv.jpg)

- **Taxa de movimento**, coloca algo entre 1000~3000 tu vai notar que os movimentos dela estão MUITO rapidos, pode começar com um valor mais baixo, e depois ir aumentando, depois que tu se acustumar.
- **Temperatura padrão Extrusora**, eu tinha testado e para padrão 235º era bem bom.
- **Temperatura padrão Mesa**, pode deixar entre 90º~100º. Dependendo de onde fica a impressora ela nunca vai chegar aos 100º =/ .

####Extruder
![enter image description here](http://i.imgur.com/WOIadJW.png)

- **Diameter** este teu bico é de 0,35mm.





##Testes

Conecta e fica de olho, em baixo deve aparecer a temperatura do Extruder e da mesa.

Com a mão mesmo coloca no meio a mesa (X) e o extruder (Y).

Abre o controle manual. (Vai estar um pouco diferente pq eu não estou conectado)

onde tem o Z aperta pra cima (quando aparecer o valor 10)

> **obs:**
> os valores são em mm logo 10 seria 1cm

![enter image description here](http://i.imgur.com/t8oTWk8.png)


se o eixo **Z** subiu o/

agora navega pelo x , y não anda MUITO pra não estourar os limites, mas vai volta etc etc....


Agora com a mão empurra os eixos até eles apertarem os end-stops, (ve se liga a luz).

> **end-stops:** ![enter image description here](http://mlb-s2-p.mlstatic.com/3x-chave-fim-de-curso-14015-MLB4321269840_052013-F.jpg)

clica em **Easy Mode** (direita em cima) e clica em **Alternar LOG**.

no campo **G-Code** escreve M119 e envia, no log deve aparecer 2 **TRIGGERED**, com a mão aperta o end-stop laranja e manda o M119, agora deve aparecer 3 **TRIGGERED** então ta tudo certo (na teoria :p ).


> Fizemos isso para verificar se nenhum cabo soltou, ou se o sensor esta "desencontrado" isso é importante pois caso esteja desconectado a impressora vai tentar "zerar a posição" e nunca vai chegar, logo vai forçar as peças e talvez até quebrar alguma.

Agora clica na "casinha X".

Agora clica na "casinha Y".

Tira o vidro e clica na "casinha Z".
> é importante calibrar esse Z (e é meio seguido que tem que fazer isso, por enquanto) pois se tu mandar zerar e não estiver, ou o fio nao vai tocar na mesa ou tu vai apertar o bico na mesa e pode forçar N peças..


viu ela andando? lindo né? :p

sobe o **Z** e coloca o vidro. Vamos calibrar o eixo **Z** 
> **obs:** Na teoria ele está ok , mas é importante que tu faça isso pois é uma das coisas que sempre vai te acompanhar pra quase sempre

Verifica se as molinhas estão "apertadas, porém soltas" é assim mesmo, elas estão firmes, mas se tu pressionar a mesa com a mão, ela deve ceder , justamente caso se aperte alguma coisa sem querer a mesa ceda e não force nada.

Tem esse vídeo que explica muito bem como fazer (**não é IGUAL**) mas é parecido. Só ignora as partes que ele colocar o filamento pra sair e tal... 


<iframe width="640" height="360" src="https://www.youtube.com/embed/ArvamVNCteY?feature=player_embedded" frameborder="0" allowfullscreen></iframe>


Agora no controle manual, ativa a mesa quente, e o extruder (se tu configurou certo vai estar os valores padrões, 235º e 90º ou 100º.

tu pode trocar a visualização pra ver o gráfico da temperatura. Espera chegar lá.

> **obs:** A fonte vai "gritar" é assim mesmo, ela tem um controle de temperatura, quanto mais coisa ligada, mais corrente, mais ela esquenta e mais ela refrigera e logo faz mais barulho.

com as temperaturas  ok sobe mais um pouco o eixo **Z**.

agora no último controle E aperta ali "10" pode apertar algumas vezes... Pronto! vai sair o fio!!

#80% do teste concluído aqui !!!


Agora vamos "fatiar" uma peça 


baixa  [esse cara](http://www.thingiverse.com/thing:697454) (é até interessante pois tu vai poder usar na impressora)

procura no **Repetier** a aba **Slicer** 

em **Fatiamento** coloca **curaengine**

 em baixo clica em **configuration**


Importa os arquivos que eu vou te mandar ..

salva tudo, clica em carregar na tela principal.

clica em > SLICE com CuraEngine


ve o resultado, que é os movimentos.


quando se sentir confiante, clica em Executar.. e ja eras (:
