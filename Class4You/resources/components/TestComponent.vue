<template>
	<div>
		<button class="button-star">
		<canvas></canvas>
		<div class="label">
			<span class="default">Star<span class="success">red</span></span>
		</div>
		<div class="number">
			<span class="current">31</span>
			<span class="new">32</span>
			<div class="add">+1</div>
		</div>
		</button>
	</div>
</template>
<script>
import * as THREE from 'three';
import gsap from 'gsap';

export default {
  mounted() {
	const scene = new THREE.Scene();
    // 스크립트를 로드하는 함수를 정의합니다.
    const loadScript = (src, callback) => {
      const script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = src;
      script.onload = callback;
      document.head.appendChild(script);
    };

    // 로드할 외부 스크립트들의 배열을 정의합니다.
    const externalScriptsToLoad = [
      'https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js',
      'https://cdn.jsdelivr.net/gh/mrdoob/three.js@r110/examples/js/loaders/DRACOLoader.js',
      'https://cdn.jsdelivr.net/gh/mrdoob/three.js@r110/examples/js/loaders/GLTFLoader.js',
	  'https://unpkg.co/gsap@3/dist/gsap.min.js'
    ];

    // 로드할 내부 스크립트의 경로를 정의합니다.
    const internalScriptToLoad = '/js/LikeButtonScript.js';

    // 외부 스크립트를 로드하는 함수
    const loadExternalScripts = (scripts, callback) => {
      let loadedScripts = 0;
      const loadNextScript = () => {
        if (loadedScripts < scripts.length) {
          loadScript(scripts[loadedScripts], () => {
            loadedScripts++;
            loadNextScript();
          });
        } else {
          callback();
        }
      };

      loadNextScript();
    };

    // 내부 스크립트를 로드하는 함수
	const loadInternalScript = (src, callback) => {
		const script = document.createElement('script');
		script.type = 'module';  // 여기에 type="module" 추가
		script.src = src;
		script.onload = callback;
		document.head.appendChild(script);
		};

    // 외부 스크립트들을 로드한 후 내부 스크립트를 로드합니다.
    loadExternalScripts(externalScriptsToLoad, () => {
      loadInternalScript(internalScriptToLoad, () => {
        // 모든 스크립트가 로드된 후 실행될 코드를 이곳에 추가합니다.
        console.log('All scripts loaded!');
      });
    });
  }
};
</script>
<style>
	
</style>