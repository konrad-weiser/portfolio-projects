const canvas=document.getElementById('canvas1');
const ctx=canvas.getContext('2d');
canvas.width=900;
canvas.height=600;

//global variables
const cellSize=100;
const cellGap=3;
const gameGrid=[];
const robots=[];
const aliens=[];
const aliensPositions=[];
const projectiles=[];
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
class Robots
{
    constructor(x,y)
    {
        this.x=x;
        this.y=y;
        this.width=cellSize;
        this.height=cellSize;
        this.shooting=false;
        this.health=100;
        this.timer=0;
    }
    draw()
    {
        ctx.fillStyle='blue';
        ctx.fillRect(this.x,this.y,this.width,this.height);
        ctx.fillStyle='gold';
        ctx.font='30px Orbitron';
        ctx.fillText(Math.floor(this.health),this.x+15,this.y+25);
    }
    update()
    {
        this.timer++;
        if(this.timer % 100 == 0)
            projectiles.push(new Projectile(this.x+70,this.y+50));
    }
}
canvas.addEventListener('click', function(){
    const gridPositionX=mouse.x-(mouse.x%cellSize);
    const gridPositionY=mouse.y-(mouse.y%cellSize);
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
        for(let j=0;j<aliens.length;j++)
        {
            if(robots[i] && collision(robots[i], aliens[j]))
            {
                robots[i].health-=02;
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
//aliens
class Alien
{
    constructor(verticalPosition)
    {
        this.x=canvas.width;
        this.y=verticalPosition;
        this.width=cellSize;
        this.height=cellSize;
        this.speed=Math.random()*0.2+0.4;
       this.movement=this.speed;
       this.health=100;
       this.maxHealth=this.health; 
    }
    update()
    {
        this.x-=this.movement;
    }
    draw()
    {
        ctx.fillStyle='red';
        ctx.fillRect(this.x,this.y,this.width,this.height);
        ctx.fillStyle='black';
        ctx.font='30px Orbitron';
        ctx.fillText(Math.floor(this.health),this.x+15,this.y+25);

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
            let gainedResources=aliens[i].maxHealth/10;
            aliens.splice(i,1);
            i--;
            numberOfResources+=gainedResources;
            score+=gainedResources;
        }
    }
    if(frame % aliensInterval == 0)
    {
        let verticalPosition=Math.floor(Math.random()*5+1)*cellSize;
        aliens.push(new Alien(verticalPosition));
        aliensPositions.push(verticalPosition);
        if(aliensInterval > 120) aliensInterval -= 50;
    }
}
//resources
//utilities
function handleGameStatus()
{
    fillStyle='gold';
    ctx.font='30px Orbitron';
    ctx.fillText('Score: '+score,20,40);
    ctx.fillText('Resources: '+numberOfResources,20,80);
    if(gameOver)
    {
        ctx.fillStyle='black';
        ctx.font='60px Orbitron';
        ctx.fillText('GAME OVER', 135,330);
    }
}
function animate()
{
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.fillStyle='blue';
    ctx.fillRect(0,0,controlsBar.width,controlsBar.height);
    handleGrid();
    handleRobots();
    handleProjectiles();
    handleAliens();
    handleGameStatus();
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