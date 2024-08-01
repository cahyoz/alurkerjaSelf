import BpmnJS from 'bpmn-js/dist/bpmn-modeler.production.min.js';
import $ from 'jquery'; 
var diagramUrl = 'https://cdn.statically.io/gh/bpmn-io/bpmn-js-examples/dfceecba/starter/diagram.bpmn';

// modeler instance
var bpmnModeler = new BpmnJS({
  container: '#canvas',
  keyboard: {
    bindTo: window
  }
});

/**
 * Save diagram contents and print them to the console.
 */
async function exportDiagram() {

  try {

    var result = await bpmnModeler.saveXML({ format: true });

    var blob = new Blob([result.xml], { type: 'application/xml' });
    var url = URL.createObjectURL(blob);

    var link = document.createElement('a');
    link.href = url;
    link.download = 'diagram.bpmn';

    document.body.appendChild(link);
    link.click();

    document.body.removeChild(link);
    URL.revokeObjectURL(url);

    alert('Diagram exported. Check the developer tools!');

    console.log('DIAGRAM', result.xml);
  } catch (err) {

    console.error('could not save BPMN 2.0 diagram', err);
  }
}

/**
 * Open diagram in our modeler instance.
 *
 * @param {String} bpmnXML diagram to display
 */
async function openDiagram(bpmnXML) {

  // import diagram
  try {

    await bpmnModeler.importXML(bpmnXML);

    // access modeler components
    var canvas = bpmnModeler.get('canvas');
    var overlays = bpmnModeler.get('overlays');


    // zoom to fit full viewport
    canvas.zoom('fit-viewport');

    // attach an overlay to a node
    overlays.add('SCAN_OK', 'note', {
      position: {
        bottom: 0,
        right: 0
      },
      html: '<div class="diagram-note">Mixed up the labels?</div>'
    });

    // add marker
    canvas.addMarker('SCAN_OK', 'needs-discussion');
  } catch (err) {

    console.error('could not import BPMN 2.0 diagram', err);
  }
}


// load external diagram file via AJAX and open it
$.get(diagramUrl, openDiagram, 'text');

// wire downlaod button
$('#download-button').click(exportDiagram);