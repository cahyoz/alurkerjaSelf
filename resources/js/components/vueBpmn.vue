<template>
    <div ref="container" class="vue-bpmn-diagram-container"></div>
  </template>
  
  <script>
    import BpmnJS from 'bpmn-js/dist/bpmn-navigated-viewer.production.min.js';
  
    export default {
      name: 'vue-bpmn',
      props: {
        url: {
          type: String,
          required: true
        },
        options: {
          type: Object
        }
      },
      data() {
        return {
          diagramXML: null
        };
      },
      mounted() {
        const container = this.$refs.container;
        const _options = Object.assign({
          container: container
        }, this.options);
        this.bpmnViewer = new BpmnJS(_options);
  
        this.bpmnViewer.on('import.done', (event) => {
          const error = event.error;
          const warnings = event.warnings;
  
          if (error) {
            this.$emit('error', error);
          } else {
            this.$emit('shown', warnings);
          }
  
          this.bpmnViewer.get('canvas').zoom('fit-viewport');
        });
  
        if (this.url) {
          this.fetchDiagram(this.url);
        }
      },
      beforeUnmount() {
        this.bpmnViewer.destroy();
      },
      watch: {
        url(val) {
          this.$emit('loading');
          this.fetchDiagram(val);
        },
        diagramXML(val) {
          this.bpmnViewer.importXML(val);
        }
      },
      methods: {
        fetchDiagram(url) {
          fetch(url)
            .then(response => response.text())
            .then(text => {
              this.diagramXML = text;
            })
            .catch(err => {
              this.$emit('error', err);
            });
        }
      }
    };
  </script>
  
  <style>
    .vue-bpmn-diagram-container {
      height: 100%;
      width: 100%;
    }
  </style>
  