(function ($) {

    if ($('.calc-form').length == 0) {
        return;
    }

    var calc = new Vue({
        el: '.calc-form',
        data()  {
            return {
                type1: '',
                type2: '',
                qvalue: '',
                depth: '',
                types1: [
                    'Биологическая очистка сточных вод',
                    'Ливневые очистные сооружения',
                    'Промышленные очистные сооружения',
                    'Канализационные насосные станции (КНС)'
                ],
                types2: [
                    [
                        'Дома и дачи',
                        'Туристическая база, санаторий',
                        'Поселок, город',
                        'Установки в наземном блочно-модульном исполнении',
                        'Жироуловители'
                    ],
                    [
                        'Сброс в городской коллектор',
                        'Сброс в водоемы'
                    ],
                    [
                        'Птицефабрика',
                        'Молокозавод',
                        'Мясопереработка'
                    ],
                    []
                ],
                catalog: {},
                result: null,
                current: null,
                current2: null,
                type: null,
                resultText: ''
            };
        },
        computed: {
            formattedPrice() {
                if (this.result == null || !this.result.price) {
                    return 0;
                }
                let p = this.result.price.toString();
                return p.replace(new RegExp("^(\\d{" + (p.length%3?p.length%3:0) + "})(\\d{3})", "g"), "$1 $2").replace(/(\d{3})+?/gi, "$1 ").trim();
            },
            groupedByQvalue() {
                return this.groupBy(this.current, x => x.qvalue);
            }
        },
        watch: {
            type1(val) {
                if (this.type1 !== '') {
                    this.type2 = '';
                    this.qvalue = '';
                    this.depth = '';
                    this.updateResult();
                }
            },
            type2(val) {
                if (this.type2 !== '') {
                    this.qvalue = '';
                    this.depth = '';
                    this.updateResult();
                }
            },
            qvalue(val) {
                if (this.qvalue !== '') {
                    this.depth = '';
                    this.updateResult();
                }
            },
            depth(val) {
                if (this.depth !== '') {
                    this.updateResult();
                }
            },
        },
        methods: {
            groupBy(list, keyGetter) {
                const map = new Map();
                list.forEach((item) => {
                    const key = keyGetter(item);
                    const collection = map.get(key);
                    if (!collection) {
                        map.set(key, [item]);
                    } else {
                        collection.push(item);
                    }
                });
                return Array.from(map);
            },
            updateResult() {
                if (this.type1 === '' || this.type2 === '') {
                    this.current = null;
                    this.current2 = null;
                    this.result = null;
                    return;
                }
                let type = this.type2;
                for (let i = 0; i < this.type1; ++i) {
                    type += this.types2[i].length;
                }
                this.type = type;
                if (typeof this.catalog[type] !== 'undefined') {
                    this.current = this.catalog[type];
                } else {
                    this.current = null;
                    this.current2 = null;
                    this.result = null;
                    return;
                }
                if (type == 0) {
                    if (this.qvalue !== '') {
                        this.current2 = this.groupedByQvalue[this.qvalue][1];
                    }
                    if (this.depth !== '') {
                        this.result = this.current2[this.depth];
                    } else {
                        this.result = null;
                    }
                } else if (type > 0 && this.qvalue !== '') {
                    this.depth = '';
                    this.result = this.current[this.qvalue];
                } else {
                    this.result = null;
                }
                this.updateResultText();
            },
            updateResultText() {
                if (this.result == null) {
                    this.resultText = '';
                    return;
                }
                this.resultText = `${this.types2[this.type1][this.type2]}, ${this.result.name}: ${this.formattedPrice} руб.`;
                $('.customer-result-field').val(this.resultText);
            }
        },
        mounted() {
            let that = this;
            $.get('/wp-json/calc/data', function (data) {
                if (!data) return;
                for (let item of data) {
                    if (typeof that.catalog[item.type] === 'undefined') {
                        that.catalog[item.type] = [];
                    }
                    that.catalog[item.type].push(item);
                }
            });
        }
    });

})(jQuery);