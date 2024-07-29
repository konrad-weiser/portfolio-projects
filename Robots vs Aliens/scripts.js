const canvas=document.getElementById('canvas1');
const ctx=canvas.getContext('2d');
canvas.width=900;
canvas.height=600;

const back=new Image();
back.src="back/back.png";
//global variables
const cellSize=100;
const cellGap=3;
const gameGrid=[];
const robots=[];
const aliens=[];
const aliensPositions=[];
const projectiles=[];
const resources=[];
let frame=0;
let aliensInterval=600;
let gameOver=false;
let score=0;
let numberOfResources=300;
//mouse
const mouse={
    x: 10,
    y: 10,
    width: 0.1,
    height: 0.1,
}
let canvasPosition=canvas.getBoundingClientRect();
canvas.addEventListener('mousemove', function(e){
    mouse.x=e.x-canvasPosition.left;
    mouse.y=e.y-canvasPosition.top;
});
canvas.addEventListener('mouseleave',function(){
    mouse.x=undefined;
    mouse.y=undefined;
});

//game board
const controlsBar={
    width: canvas.width,
    height: cellSize,
}
class Cell
{
    constructor(x,y)
    {
        this.x=x;
        this.y=y;
        this.width=cellSize;
        this.height=cellSize;
    }
    draw()
    {
        if(mouse.y && mouse.x && collision(this,mouse))
        {
            ctx.strokeStyle='black';
            ctx.strokeRect(this.x, this.y, this.width, this.height);
        }
    }
}
function createGrid()
{
    for(let y=cellSize;y<canvas.height;y+=cellSize)
    {
        for(let x=0;x<canvas.width;x+=cellSize)
            gameGrid.push(new Cell(x,y));
    }
}
createGrid();
function handleGrid()
{
    for(let i=0;i<gameGrid.length;i++)
    {
        gameGrid[i].draw();
    }
}
//projectiles
class Projectile
{
    constructor(x,y)
    {
        this.x=x;
        this.y=y;
        this.width=10;
        this.height=10;
        this.power=20;
        this.speed=5;
    }
    update()
    {
        this.x+=this.speed;
    }
    draw()
    {
        ctx.fillStyle='black';
        ctx.beginPath();
        ctx.arc(this.x,this.y,this.width,0,Math.PI*2);
        ctx.fill();
    }
}
function handleProjectiles()
{
    for(let i=0;i<projectiles.length;i++)
    {
        projectiles[i].update();
        projectiles[i].draw();

        for(let j=0;j<aliens.length;j++)
        {
            if(aliens[j] && projectiles[i] && collision(projectiles[i],aliens[j]))
            {
                aliens[j].health-=projectiles[i].power;
                projectiles.splice(i,1);
                i--;
            }
        }

        if(projectiles[i] && projectiles[i].x>canvas.width-cellSize/4)
        projectiles.splice(i,1);
    }
}
//robots
const robotTypes=[];
const robot1=new Image();
robot1.src="robots/robot1.png";
robotTypes.push(robot1);
class Robots
{
    constructor(x,y)
    {
        this.x=x;
        this.y=y;
        this.width=cellSize-cellGap*2;
        this.height=cellSize-cellGap*2;
        this.shooting=false;
        this.health=100;
        this.timer=0;
        this.shootimer=20;
        this.robotType=robotTypes[0];
        this.frameX=0;
        this.frameY=0;
        this.minFrame=0;
        this.maxFrame=4;
        this.spriteWidth=567;
        this.spriteHeight=556;
    }
    draw()
    {
        //ctx.fillStyle='blue';
       // ctx.fillRect(this.x,this.y,this.width,this.height);
        ctx.fillStyle='red';
        ctx.font='30px Orbitron';
        ctx.fillText(Math.floor(this.health),this.x+15,this.y+25);
        ctx.drawImage(this.robotType, this.frameX*this.spriteWidth,0,this.spriteWidth,this.spriteHeight,this.x,this.y,this.width,this.height);
    }
    update()
    {
        if(this.shooting)
        {
            this.timer++;
            if(this.timer % 100 == 0)
                projectiles.push(new Projectile(this.x+70,this.y+50));
            if(this.timer>20)
            {
                this.shootimer++;
                if(this.shootimer % 20 == 0) 
                {
                    if(this.frameX<this.maxFrame)this.frameX++;
                    else this.frameX=0;
                }
             }
        }
        else
        {
            this.timer=0;
            this.frameX=0;
            this.shootimer=20; //1 strzal  pol ruchu
        }
    }
}
canvas.addEventListener('click', function(){
    const gridPositionX=mouse.x-(mouse.x%cellSize)+cellGap;
    const gridPositionY=mouse.y-(mouse.y%cellSize)+cellGap;
    if(gridPositionY<cellSize) return;
    for(let i=0;i<robots.length;i++)
    {
        if(robots[i].x==gridPositionX && robots[i].y==gridPositionY)
        return;
    }
    let robotCost=100;
    if(numberOfResources>=robotCost)
    {
        robots.push(new Robots(gridPositionX,gridPositionY));
        numberOfResources-=robotCost;
    }
});
function handleRobots()
{
    for(let i=0;i<robots.length;i++)
    {
        robots[i].draw();
        robots[i].update();
        if(aliensPositions.indexOf(robots[i].y)!=-1)
        {
            robots[i].shooting=true;
        }
        else
        {
            robots[i].shooting=false;
        }
        for(let j=0;j<aliens.length;j++)
        {
            if(robots[i] && collision(robots[i], aliens[j]))
            {
                robots[i].health-=0.2;
                aliens[j].movement=0;
            }
            if(robots[i] && robots[i].health<=0)
            {
                robots.splice(i,1);
                i--;
                aliens[j].movement=aliens[j].speed;
            }
        }
    }
}
//Floating Messages
const floatingMessages=[];
class floatingMessage
{
    constructor(value,x,y,size,color)
    {
        this.x=x;
        this.y=y;
        this.size=size;
        this.lifeSpan=0;
        this.color=color;
        this.value=value;
        this.opacity=1;
    }
    update()
    {
        this.y-=0.3;
        this.lifeSpan+=1;
        if(this.opacity>0.05) this.opacity-=0.05;
    }
    draw()
    {
        ctx.globalAlpha=this.opacity;
        ctx.fillStyle=this.color;
        ctx.fillText(this.value,this.x,this.y);
        ctx.globalAlpha=1;
    }
}
function handleFloatingMessages()
{
    for(let i=0; i<floatingMessages.length; i++)
    {
        floatingMessages[i].update();
        floatingMessages[i].draw();
        if(floatingMessages[i].lifeSpan>=50)
        {
            floatingMessages.splice(i,1);
            i--;
        }
    }
}
//aliens
const alienTypes=[];
const alien1=new Image();
alien1.src='aliens/zombie.png';
alienTypes.push(alien1);
class Alien
{
    constructor(verticalPosition)
    {
        this.x=canvas.width;
        this.y=verticalPosition;
        this.width=cellSize-cellGap*2;
        this.height=cellSize-cellGap*2;
        this.speed=Math.random()*0.2+0.4;
       this.movement=this.speed;
       this.health=100;
       this.maxHealth=this.health; 
       this.alienType=alienTypes[0];
       this.frameX=0;
       this.frameY=0;
       this.minFrame=0;
       this.maxFrame=4;
       this.spriteWidth=292;
       this.spriteHeight=410;
    }
    update()
    {
        this.x-=this.movement;
        if(frame%10==0)
        {
            if(this.frameX<this.maxFrame) this.frameX++;
            else this.frameX=this.minFrame;
        }
    }
    draw()
    {
        //ctx.fillStyle='red';
        //ctx.fillRect(this.x,this.y,this.width,this.height);
        ctx.fillStyle='black';
        ctx.font='30px Orbitron';
        ctx.fillText(Math.floor(this.health),this.x+15,this.y+25);
        //ctx.drawImage(img, sx, sy, sw, sh, dx, dy, dw, dh);
        ctx.drawImage(this.alienType,this.frameX*this.spriteWidth,0,this.spriteWidth,this.spriteHeight,this.x,this.y,this.width,this.height);
    }
}
function handleAliens()
{
    for(let i=0;i<aliens.length;i++)
    {
        aliens[i].update();
        aliens[i].draw();
        if(aliens[i].x<0)
        {
            gameOver=true;
        }
        if(aliens[i].health<=0)
        {
            let gainedResources=aliens[i].maxHealth/5;
            floatingMessages.push(new floatingMessage('+'+gainedResources,aliens[i].x,aliens[i].y,30,'black'));
            floatingMessages.push(new floatingMessage('+'+gainedResources,250,50,30,'gold'));
            const index_position=aliensPositions.indexOf(aliens[i].y);
            aliensPositions.splice(index_position,1);
            aliens.splice(i,1);
            i--;
            numberOfResources+=gainedResources;
        }
    }
    if(frame % aliensInterval == 0)
    {
        let verticalPosition=Math.floor(Math.random()*5+1)*cellSize+cellGap;
        aliens.push(new Alien(verticalPosition));
        aliensPositions.push(verticalPosition);
        if(aliensInterval > 120) aliensInterval -= 50;
		else if(frame>8000 && aliensInterval>30) aliensInterval-=10;
    }
}
//resources
const amounts=[20,30,40];
class Resource 
{
    constructor()
    {
        this.x=Math.random()*(canvas.width-cellSize);
        this.y=(Math.floor(Math.random()*5)+1)*cellSize+25;
        this.width=cellSize*0.6;
        this.height=cellSize*0.6;
        this.amount=amounts[Math.floor(Math.random()*amounts.length)];
    }
    draw()
    {
        ctx.fillStyle='yellow';
        ctx.fillRect(this.x,this.y,this.width,this.height);
        ctx.fillStyle='black';
        ctx.font='20px Orbitron';
        ctx.fillText(this.amount,this.x+15, this.y+25);
    }
}
function handleResources()
{
    if(frame % 500 == 0 && score)
    {
        resources.push(new Resource());
    }
    for(let i=0;i<resources.length;i++)
    {
        resources[i].draw();
        if(resources[i] && mouse.x && mouse.y && collision(resources[i],mouse))
        {
            numberOfResources+=resources[i].amount;
            floatingMessages.push(new floatingMessage('+'+resources[i].amount,resources[i].x,resources[i].y,30,'black'));
            floatingMessages.push(new floatingMessage('+'+resources[i].amount,250,50,30,'gold'));
            resources.splice(i,1);
            i--;
        }
    }
}
//utilities
function handleGameStatus()
{
    ctx.fillStyle='gold';
    ctx.font='30px Orbitron';
	score=Math.floor(frame/50);
    ctx.fillText('Score: '+score,20,40);
    ctx.fillText('Resources: '+numberOfResources,20,80);
    if(gameOver)
    {
        ctx.fillStyle='black';
        ctx.font='60px Orbitron';
        ctx.fillText('GAME OVER', 135,330);
    }
}
canvas.addEventListener('click', function(){
    const gridPositionX=mouse.x-(mouse.x%cellSize)+cellGap;
    const gridPositionY=mouse.y-(mouse.y%cellSize)+cellGap;
    if(gridPositionY<cellSize) return;
    for(let i=0;i<robots.length;i++)
    {
        if(robots[i].x==gridPositionX && robots[i].y==gridPositionY)
        return;
    }
    let robotCost=100;
    if(numberOfResources>=robotCost)
    {
        robots.push(new Robots(gridPositionX,gridPositionY));
        numberOfResources-=robotCost;
    }
    else
    {
        floatingMessages.push(new floatingMessage('need more resources',mouse.x, mouse.y, 15, 'blue'));
    }
});
function animate()
{
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.drawImage(back,0,0,1920,903,0,0,canvas.width,canvas.height);
    ctx.fillStyle='black';
    ctx.globalAlpha=0.5;
    ctx.fillRect(0,0,controlsBar.width,controlsBar.height);
    ctx.globalAlpha=1;
    handleGrid();
    handleRobots();
    handleResources();
    handleProjectiles();
    handleAliens();
    handleGameStatus();
    handleFloatingMessages();
    frame++;
    if(!gameOver) requestAnimationFrame(animate);
}
animate();

function collision(first,second)
{
    if( !(first.x > second.x + second.width ||
          first.x + first.width < second.x ||
          first.y > second.y + second.height ||
          first.y + first.height < second.y))
          return true;
}
window.addEventListener("resize",function(){
    canvasPosition=canvas.getBoundingClientRect();
});