import { ease } from './utils.js';
import _ from './../../node_modules/underscore/underscore.js';
import './../../node_modules/svgjs/dist/svg.js';
import './../../node_modules/svg-filter/index.js';

const canvas = document.querySelector('.home-animation');

if(canvas)
{
    let canvasW = window.innerWidth,
        canvasH = window.innerHeight;
        // Set canvas size
        canvas.style.width = canvasW + 'px';
        canvas.style.height = canvasH + 'px';

    let progress = 0,
        stepProgress = 0,
        allowScroll = true,
        stepDuration = 1,
        scaleMax = 4,
        currentStep = 0;

    let svg = document.querySelector('.home-animation__svg'),
        svgObj = SVG.adopt(svg);

    // SVG Groups
    let groupsArr = [],
        groups = svg.querySelectorAll('g');

    // Loop groups and create object with properties
    for(let i = 0; i < groups.length; i++)
    {
        let g = groups[i];

        groupsArr.push({
            ref: g,
            svgObj: svgObj.children()[i],
            startFrame: 0,
            opacity: 1,
            stepStartScale: 1,
            initScaleFactor: Math.pow(.5, i)
        })
    }

    let headers = document.querySelectorAll('.home-animation__header');

    console.log('groups', groupsArr);

    window.addEventListener('mousewheel', function(e){
        e.preventDefault();

        if(allowScroll) renderAnim(e.deltaY);
    });

    function renderAnim(delta)
    {
        // Track progress at 60 fps
        progress += 1 / 60;
        stepProgress += 1 / 60;

        // Restrict scroll from firing render()
        allowScroll = false;

        let direction = delta;

        // Do nothing when scrolling down on first step or scrolling up on last step
        if(direction > 0 && currentStep == 0 || direction < 0 && currentStep == groupsArr.length - 1) {
            allowScroll = true;
            return;
        }

        // run for 1 seconds
        if(stepProgress >= 1)
        {
            stepProgress = 0;
            (direction > 0) ? currentStep-- : currentStep++;
            // TODO: Cleaner way to do this for loop?
            for(let i = 0; i < groupsArr.length; i++)
            {
                let group = groupsArr[i];
                group.stepStartScale = group.ref.getBoundingClientRect().width / group.ref.getBBox().width; // set group scale at the end of each step
            }
            allowScroll = true;
            return;
        }

        for(let i = (direction > 0) ? currentStep - 1 : currentStep; i < groupsArr.length; i++)
        {
            // let group = groupsArr[i],
            //     scaleFactor = Math.pow(0.33, (direction > 0) ? Math.abs(currentStep - (i + 1)) : i - currentStep),
            //     scale = ease(0, progress, 0, (scaleFactor * 3), stepDuration),
            //     newScale = (direction > 0) ? group.stepStartScale - (scale * scaleFactor) : (scale * scaleFactor + 1) * group.stepStartScale,
            //     newOpacity = (direction > 0) ? 1 + ease(0, progress, 0, 1, stepDuration) : 1 - ease(0, progress, 0, 1, stepDuration);

            let easeType = 'easeInOutCubic';

            // currentStep = 0
            // i=0: scaleMax = 4
            // i=1: scaleMax = 1.5
            // i=2: scaleMax = 1.25
            // i=3: scaleMax = 1.125

            //currentStep = 1
            // i=0:
            // i=1: scaleMax = 4
            // i=2: scaleMax = 1.5
            // i=3: scaleMax = 1.25

            // currentStep = 2
            // i=0:
            // i=1:
            // i=2: scaleMax = 4
            // i=3: scaleMax = 1.5

            let scaleMax = 0;

            switch(currentStep) {
                case 0:
                    switch(i) {
                        case 0:
                            scaleMax = 4;
                            break;
                        case 1:
                            scaleMax = .5;
                            break;
                        case 2:
                            scaleMax = .125;
                            break;
                        case 3:
                            scaleMax = .0625;
                            break;
                    }
                    break;

                case 1:
                    switch(i) {
                        case 0:
                            scaleMax = 4;
                            break;
                        case 1:
                            scaleMax = 4;
                            break;
                        case 2:
                            scaleMax = .5;
                            break;
                        case 3:
                            scaleMax = .125;
                            break;

                    }
                    break;

                case 2:
                    switch(i) {
                        case 0:
                            scaleMax = 4;
                            break;
                        case 1:
                            scaleMax = 4;
                            break;
                        case 2:
                            scaleMax = 4;
                            break;
                        case 3:
                            scaleMax = .5;
                            break;
                    }
                    break;

                case 3:
                    switch(i) {
                        case 0:
                            scaleMax = 4;
                            break;
                        case 1:
                            scaleMax = 4;
                            break;
                        case 2:
                            scaleMax = 4;
                            break;
                        case 3:
                            scaleMax = 4;
                            break;
                    }
                    break;
            }

            let newOpacity = 1;

            let group = groupsArr[i],
                scale = scaleMax * (stepProgress / stepDuration),
                scaleEased = ease(easeType, 0, stepProgress, 0, scaleMax, stepDuration),
                newScale = group.stepStartScale + scaleEased;

            if(i == currentStep) {
                newOpacity = 1 - ease(easeType, 0, stepProgress, 0, 1, stepDuration);
            }

            // let group = groupsArr[i],
            //     groupTotalDuration = i + 1,
            //     scaleFactor = Math.pow(0.33, i),
            //     //newScale = 1 + (scale * scaleFactor),
            //     scale = ease(easeType, 0, progress, 0, 1, groupTotalDuration),
            //     //scale = (scaleMax * (progress / groupTotalDuration)),
            //     newScale = (scale);

            if(i == 2) {
                //console.log('group.stepStartScale', group.stepStartScale, Math.pow(.33, (i-currentStep)), 'scale', scale, 'progress', progress);
                //console.log('scale', scale, 'group.stepStartScale', group.stepStartScale);
               // console.log('progress', progress, 'scale', scale, 'scaleFactor', scaleFactor, 'newScale', newScale);
            }

            // let groupTotalDuration = (stepDuration * (i + 1)),
            //     scale = (progress / stepDuration) * scaleMax,
            //     scaleFactor = Math.pow(0.5, Math.abs(i - currentStep)),
            //     newScale = (1) + (scale * scaleFactor);


            // let groupTotalDuration = (stepDuration * (i + 1)),
            //     scale = scaleMax * (progress / groupTotalDuration),
            //     scaleFactor = Math.pow(0.5, i - (stepProgress * i)),
            //     newScale = 1 + (scale * scaleFactor);

            // Scale Factor change range for each step
            // Step 0: (i * .25) = 0
            // Step 1: (i * .25) = .25
            // Step 2: (i * .25) = .75
            // Step 3: (i * .25) = 1.75

            // newScale calculation ranges per step
            // 0: 1.004 - 1.25
            // 1: 1.004 - 1.5
            // 2: 1.004 - 2
            // 3: 1.004 - 2.25

            // Scale factors for group i = 2
            // CS = 0
            // .5^2-(.016*0) = .25 * (3 * (.016/3)) + 1 = 1.004  = newScale
            // .5^2-(.5*0) = .25 * (3 * (.5/3)) + 1 =  1.125 = newScale
            // .5^2-(.75*0) = .25 * (3 * (.75/3)) + 1 = 1.1875 = newScale
            // .5^2-(1*0) = .25 * (3 * (1/3)) + 1 =  1.25 = newScale

            // CS = 1
            // .5^2-(.016*1) = .25278 * (3 * (.016/3)) + 1 = 1.0004 = newScale
            // .5^2-(.5*1) = .3536 * (3 * (.5/3)) + 1 = 1.178 = newScale
            // .5^2-(.75*1) = .42045 * (3 * (.75/3)) + 1 = 1.315 = newScale
            // .5^2-(1*1) = .5 * (3 * (1/3)) + 1 = 1.5 = newScale

            // CS = 2
            // .5^2-(.016*2) = .2556 * (3 * (.016/3)) + 1 = 1.004 = newScale
            // .5^2-(.5*2) = .5 * (3 * (.5/3)) + 1 = 1.25 = newScale
            // .5^2-(.75*2) = .707 * (3 * (.75/3)) + 1 = 1.53 = newScale
            // .5^2-(1*2) = 1 * (3 * (1/3)) + 1 = 2 = newScale

            // CS = 3
            // .5^2-(.016*3) = .2585 * (3 * (.016/3)) + 1 = 1.004 = newScale
            // .5^2-(.5*3) = .707 * (3 * (.5/3)) + 1 = 1.353 = newScale
            // .5^2-(.75*3) = 1.189 * (3 * (.75/3)) + 1 = 1.892 = newScale
            // .5^2-(1*3) = 2 * (3 * (1/3)) + 1 = 3 = newScale

            //if(stepProgress >= 1) scale = Math.ceil(scale);

            // Adjust scale
            group.ref.style.transform = 'scale(' + newScale + ')';

            // Adjust opacity when moving into background
            group.svgObj.attr('fill-opacity', newOpacity);

            if(i == 0) {
                let headerScaleEased = ease(easeType, 0, stepProgress, 0, 3, stepDuration),
                    newHeaderScale = headerScaleEased + 1;

                headers[0].style.transform = 'scale('+ newHeaderScale +') translateX(-'+ newHeaderScale +'px)';
                headers[0].style.opacity = newOpacity;
            }
        }

        window.requestAnimationFrame(function(){
            renderAnim(delta);
        });
    }
}