<template>
    <vue-bpmn
      :url="bpmnUrl"
      :options="options"
      @error="handleError"
      @shown="handleShown"
      @loading="handleLoading"
    ></vue-bpmn>
  </template>
  
  <script>
    import VueBpmn from './vueBpmn.vue';
  
    export default {
      components: {
        VueBpmn
      },
      data() {
        return {
          bpmnUrl: '/path/to/your/diagram.bpmn', // Example URL
          options: {
            propertiesPanel: {},
            additionalModules: [],
            moddleExtensions: []
          }
        };
      },
      methods: {
        handleError(err) {
          console.error('Error loading diagram:', err);
        },
        handleShown(warnings) {
          console.log('Diagram shown with warnings:', warnings);
        },
        handleLoading() {
          console.log('Diagram is loading');
        }
      }
    };
  </script>
  