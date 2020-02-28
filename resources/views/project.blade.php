<html>
<head>
    <meta charset="UTF-8" />
    <title>Example Dynamic Form</title>
    <script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
    <style>
        .fileContainer {
            overflow: hidden;
            position: relative;
        }
        
        .fileContainer [type=file] {
            cursor: inherit;
            display: block;
            font-size: 999px;
            filter: alpha(opacity=0);
            min-height: 21px;
            min-width: 100%;
            opacity: 0;
            position: absolute;
            right: 0;
            text-align: right;
            top: 0;
        }
        
        .fileContainer {
            background: #E3E3E3;
            float: left;
            padding: .5em;
            height: 21px;
        }
        
        .fileContainer [type=file] {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="app">
        <table class="table">
            <thead>
                <tr>
                    <td><strong>Title</strong></td>
                    <td><strong>Description</strong></td>
                    <td><strong>File</strong></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in rows">
                    <td><input type="text" v-model="row.title"></td>
                    <td><input type="text" v-model="row.description"></td>
                    <td>
                        <label class="fileContainer">
                            @{{ row.file.name }}
                            <input type="file" @change="setFilename($event, row)" :id="index">
                        </label>
                    </td>
                    <td>
                        <a v-on:click="removeElement(index);" style="cursor: pointer">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <button class="button btn-primary" @click="addRow">Add row</button>
        </div>
    </div>

    <script type="text/javascript">
        var app = new Vue({
            el: "#app",
            data: {
                rows: []
            },
            methods: {
                addRow: function() {
                    var elem = document.createElement('tr');
                    this.rows.push({
                        title: "",
                        description: "",
                        file: {
                            name: 'Choose File'
                        }
                    });
                },
                removeElement: function(index) {
                    this.rows.splice(index, 1);
                },
                setFilename: function(event, row) {
                    var file = event.target.files[0];
                    row.file = file
                }
            }
        });
    </script>
</body>

</html>