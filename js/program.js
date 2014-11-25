//Generales MOGLE
var pngSize = 32;  //Cambialo para escalar la escena

//Para el area de edicion de nivel
var renderer;
var stage;

var matrixWidth;
var matrixHeight;
var spriteInfo;
var spriteArray;

//Para el area de Tileset
var rendererT;
var stageT;

var pngSizeP = 32 ;  //Cambialo para escalar la escene
var recContenedor;   //Rectangulo que contiene el recorte que se hara al tileSetTexture
var tileSetTexture;
var tileSetSprite;
var tileSetSelectionSprite; //nuevo,Seleccion
var selectedTileset;

var layerSeleccionado;
var numLayers;

function textureHolder(textureURL,x,y,layer){
    this.textureURL = textureURL;
    this.x       = x;
    this.y       = y;
    this.layer   = layer;
}

//Primero lo que corresponde al Tileset
function createTileSet(){
    selectedTileset  = "./images/tilesets/Dungeon_A1.png";
    texturaBase     = new PIXI.BaseTexture.fromImage(selectedTileset);
    tileSetTexture  = new PIXI.Texture.fromImage(selectedTileset);
    tileSetSprite   = new PIXI.Sprite(tileSetTexture);
    stageT          = new PIXI.Stage(0xe6e6fa);

    tileSetSelectionSprite = new PIXI.Sprite(new PIXI.Texture.fromImage("./images/imgs/seleccion.png"));
    tileSetSprite.setInteractive(true);
    tileSetSprite.click     = tileAction;  //Dispositivos con ratón
    tileSetSprite.tap       = tileAction; //Para dispositivos touch
    //tileSetSprite.mouseover = tileSelection;
    //tileSetSprite
    tileSetSprite.setInteractive(true);
    stageT.addChild(tileSetSprite);
    stageT.addChild(tileSetSelectionSprite);


    recContenedor   = new PIXI.Rectangle(0,0,pngSize,pngSize);

    rendererT = PIXI.autoDetectRenderer(0,0);
    setTimeout(redimension,500);

	 document.getElementById("tileViewer").appendChild(rendererT.view);
    //document.body.appendChild(rendererT.view);
    requestAnimFrame(animateTileset);
}

function tileSelection(interact){

    console.log("Me muevo");

}
function animateTileset() {
    requestAnimFrame(animateTileset);
    rendererT.render(stageT);
}

function tileAction(interact)
{
    tileSetSelectionSprite.x = pngSize * Math.floor(interact.global.x / pngSize) - 2;
    tileSetSelectionSprite.y = pngSize * Math.floor(interact.global.y / pngSize) - 2;

    console.log("El TileSet Recibio click : ");
    //Buscar correspondencia en matriz segun puntos en la propiedad "global"
    var tileX = Math.floor(interact.global.x / pngSize);
    var tileY = Math.floor(interact.global.y / pngSize);

    console.log("Se selecciono el elemento en posicion: [" + tileX + " , " + tileY + "]");
    //Generacion del rectangulo contenedor del PNG. equivalente a un recorte
    recContenedor = new PIXI.Rectangle(tileX * pngSize, tileY * pngSize,32,32);
    console.log(recContenedor);

   //Por si las moscas
}

function cargarTileSet(){
    rendererP =  PIXI.autoDetectRenderer(pngSize,pngSize);
    //recContenedor = new PIXI.Rectangle(0,0,pngSize,pngSize);

    selectedTileset     = "./images/tilesets/" + document.getElementById("seleccionTileset").value;
    texturaBase         =   new PIXI.BaseTexture.fromImage(selectedTileset);
    tileSetSprite.texture = new PIXI.Texture.fromImage("./images/tilesets/" + document.getElementById("seleccionTileset").value);

    console.log("Se selecciono: " + selectedTileset +  "Con dimension" + tileSetSprite.width + " " + tileSetSprite.height);

    setTimeout(redimension,500); //Se necesita un tiempo para cargar la imagen
    recContenedor   = new PIXI.Rectangle(0,0,pngSize,pngSize);
}

function redimension(){
    console.log("Redimensionado a " + tileSetSprite.width + " x "+tileSetSprite.height );
    rendererT.resize(tileSetSprite.width,tileSetSprite.height);
}

function createMatrix(matrixWidth, matrixHeight,layers) {

    numLayers        = layers +1; //Una mas, de chocolate
    renderer         = PIXI.autoDetectRenderer(matrixWidth * pngSize, matrixHeight * pngSize);
    stage            = new PIXI.Stage(0xe6e6fa);
    console.log(numLayers + " Capas");

    //Matriz 3Dimensiones
    spriteInfo       = new Array();
    spriteArray      = new Array();

	 document.getElementById("editor_grafico").appendChild(renderer.view);
    //document.body.appendChild(renderer.view);

    requestAnimFrame(animate);

    for (l = 0 ; l < numLayers ; l++ ){
       spriteArray[l] = new Array();
       spriteInfo [l] = new Array();

        //Llenar con blancos
        for (i = 0 ; i < matrixWidth ; i++) {
	       spriteArray [l][i] = new Array();
	       spriteInfo  [l][i] = new Array();
            indiceLetra = i;

	        for (k = 0 ; k < matrixHeight ; k++) {
	            //Un URL de ejemplo
	            //spriteInfo[i][k] = "./imgs/blank.png";
                spriteInfo[l][i][k] = new textureHolder(
                    getNextMogle(),
                    0,0,l
                ); //Y no es mentira n_n

	           //Se toman las texturas de una serie de URLs, contenidas por el HOLDER

                if (l == 0){
                   spriteArray[l][i][k] = new PIXI.Sprite(PIXI.Texture.fromImage(spriteInfo[l][i][k].textureURL));
	            }
                else{
                    spriteInfo[l][i][k].textureURL = "./images/imgs/vacio.png";
                    spriteArray[l][i][k] = new PIXI.Sprite(PIXI.Texture.fromImage(spriteInfo[l][i][k].textureURL));
                }
                   spriteArray[l][i][k].position.x = (pngSize / 2) + pngSize * i;
	               spriteArray[l][i][k].position.y = (pngSize / 2) + pngSize * k;
	               spriteArray[l][i][k].anchor.x = 0.5;
	               spriteArray[l][i][k].anchor.y = 0.5;
	               spriteArray[l][i][k].setInteractive(true);
	               spriteArray[l][i][k].click = spriteAction;
	               spriteArray[l][i][k].tap = spriteAction;


                   spriteArray[l][i][k].mousedown = setPaint;   //para cosos touch
                   spriteArray[l][i][k].mouseover = paintF;   //para cosos touch
	               spriteArray[l][i][k].mouseup = unsetPaint;   //para cosos touch


                   stage.addChild(spriteArray[l][i][k]);
	       }
        }
	}
    //console.log(JSON.stringify(spriteInfo));
}

var paint;
function setPaint(interact){
    spriteAction(interact);
    paint = true;
}

function unsetPaint(interact){
    paint = false;
}

function paintF(interact){
    if (paint){
        spriteAction(interact);
    }
}


function animate() {
    requestAnimFrame(animate);
    renderer.render(stage);
}

function spriteAction(interact) {
    console.log("Recibio click: ");

    //Buscar correspondencia en matriz segun puntos en la propiedad "global"
    var xB = Math.floor(interact.global.x / pngSize);
    var yB = Math.floor(interact.global.y / pngSize);

    //Layer Seleecionado
    layerSeleccionado =  document.getElementById("seleccionLayer").value;
    console.log(" [" + xB + " , " + yB + "] " + layerSeleccionado);

    //Actualizamos la URL de la textura modificada, y las posiciones de donde se tomo, este array guarda el registro
    spriteInfo[layerSeleccionado][xB][yB].textureURL = selectedTileset;
    spriteInfo[layerSeleccionado][xB][yB].x          = recContenedor.x / pngSize; //¿Magia?
    spriteInfo[layerSeleccionado][xB][yB].y          = recContenedor.y / pngSize;
    spriteInfo[layerSeleccionado][xB][yB].layer      = layerSeleccionado;
    //Actualizamos el Sprite con la textura
    //interact.target.texture = PIXI.Texture.fromImage(spriteInfo[xB][yB]);

	//interact.target.texture = new PIXI.Texture(texturaBase,recContenedor);

    spriteArray[layerSeleccionado][xB][yB].texture = new PIXI.Texture(texturaBase,recContenedor);
    console.log("Se aplico: " + JSON.stringify(spriteInfo[layerSeleccionado][xB][yB]));

    redraw();
}

function exportar() {
    console.log("Exportado JSON");
    console.log(JSON.stringify(spriteInfo));
}

//MapData debera ser un JSON con la información del mapa, (Un String)
function importar(mapData) {
    spriteInfo = JSON.Parse(mapData);

    redraw();
    console.log("Hecho!");
}

function redraw() {
    //Los datos del holder
    //this.textureURL = textureURL;
    //this.x       = x;
    //this.y       = y;
    //this.layer   = layer;

    for(l = 0 ; l < numLayers ; l++){
        for (i = 0 ; i < matrixWidth ; i++) {
            for (k = 0 ; k < matrixHeight ; k++) {
                var tileX = Math.floor(interact.global.x / pngSize);
                var tileY = Math.floor(interact.global.y / pngSize);

                //Generacion del rectangulo contenedor del PNG. equivalente a un recorte
                recContenedor = new PIXI.Rectangle(tileX * pngSize, tileY * pngSize,32,32);

                //Recupera la textura base
                texturaBase     = new PIXI.BaseTexture.fromImage(spriteInfo[l][i][k].textureURL);

                //Se aplica la textura deseada
                spriteArray[l][i][k].texture = new PIXI.Texture(texturaBase,recContenedor);
                console.log("Aplicado");
            }
        }
    }
}

var indiceLetra = 0;
function getNextMogle(){
    var imagenLetra = new Array();
    imagenLetra[0] = "./images/letras/M.png"
    imagenLetra[1] = "./images/letras/O.png"
    imagenLetra[2] = "./images/letras/G.png"
    imagenLetra[3] = "./images/letras/L.png"
    imagenLetra[4] = "./images/letras/E.png"

    return  imagenLetra[indiceLetra++ % 5];
}