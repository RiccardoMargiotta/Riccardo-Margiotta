---
title: "Performant CSS skeleton loader animations"
---

# Performant CSS skeleton loader animations

I maintain the CSS framework at my work, Chassis. I work at car retailer and we went through a phase of naming everything after car parts - we have Gearbox, Ignition, Piston, even a Carwash... thankfully we soon ran out of good names.A few years back, we saw a number of teams each implementing their own take on skeleton leaders, these little loading states:

.

When that happens, it's a good sign you should take what you've learned, polish it, and make it a part of your component library.(Josh Clark bigmedium post?)

...

When I reviewed the different implementations, there was a common issue - although they looked good, the skeleton loaders weren't particularly smooth. The animation would occasionally stutter and drop frames, especially if a few of them were on screen at once. There was a classic culprit that doesn't always show up on our fancy work MacBooks: some CSS properties are more expensive to animate than others, performance wise.

...

One last tip - try to match the size of your skeleton loaders to the content that's being loaded in. That way you won't have a jarring reflow of the layout as the new content appears.

...

---

old content

Use skeletons as layout placeholders while content is loading. You’ll need to set your own element sizes within your app, it’s recommended to try to match the size of the content that will be loaded in.

---

I've generally found that animating background-position can be quite expensive for performance, particularly on lower-powered devices. I always come back to this:
[https://www.html5rocks.com/en/tutorials/speed/high-performance-animations/](https://www.html5rocks.com/en/tutorials/speed/high-performance-animations/)

So my thought was that, since all of these `<div>`s are just placeholders to get replaced, there's no risk setting `position: relative` and `overflow: hidden` on them. We can then use a `:before` pseudo element with the gradient background, and transform that being moved repeatedly over the top of the element. With the overflow hidden, we won't see the background when it's placed outside of the containing element. I then set the width of the gradient element, and the position from which it animates, to `100vw` or 100% of the viewport. That means all skeletons on the page will animate at the same rate.

```sass
.ch-skeleton {
  background-color: $grey-3;
  -webkit-mask-image: -webkit-radial-gradient($white, $black); // Safari
  overflow: hidden;
  position: relative;

  &:before {
    animation: skeleton-pulse 1.2s ease-in-out infinite;
    background: linear-gradient(
      -90deg,
      $grey-3 0%,
      $grey-1 40%,
      $grey-1 60%,
      $grey-3 100%
    );
    bottom: 0;
    content: "";
    display: block;
    left: 0;
    position: absolute;
    top: 0;
    width: 100vw;
  }
}

@keyframes skeleton-pulse {
  0% {
    transform: translateX(-100vw);
  }

  100% {
    transform: translateX(100vw);
  }
}
```

```html
<div class="ch-display--flex ch-mb--2">
  <div class="ch-circle ch-skeleton" style="height: 80px; width: 80px;"></div>
  <div class="ch-ml--2 ch-flex--auto">
    <div class="ch-mb--2 ch-skeleton" style="height: 20px;"></div>
    <div class="ch-mb--2 ch-skeleton" style="height: 20px;"></div>
  </div>
</div>
<div class="ch-width--12 ch-skeleton" style="height: 120px;"></div>
```
