let e=gsap.timeline(),t=gsap.timeline(),a=gsap.timeline();e.to(".cog1",{transformOrigin:"50% 50%",rotation:"+=360",repeat:-1,ease:Linear.easeNone,duration:8});t.to(".cog2",{transformOrigin:"50% 50%",rotation:"-=360",repeat:-1,ease:Linear.easeNone,duration:8});a.fromTo(".wrong-para",{opacity:0},{opacity:1,duration:1,stagger:{repeat:-1,yoyo:!0}});
