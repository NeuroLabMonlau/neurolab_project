import moment from "moment";

export default function (start) {
    let fecha = moment(start);

    return fecha.format("YYYY-MM-DD HH:mm:ss");
}
