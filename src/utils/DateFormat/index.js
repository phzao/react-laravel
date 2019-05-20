import moment from  'moment'


export const getDateInFull = (date) => {
    if (moment(date).isValid()===false) {
        return ""
    }
    return moment(date).format('DD MMMM YYYY')
}

export const getMonthFull = (date) => {
    if (moment(date).isValid()===false) {
        return ""
    }
    return moment(date).format('MMMM')
}

export const getDayFull = (date) => {
    if (moment(date).isValid()===false) {
        return ""
    }
    return moment(date).format('DD')
}

export const getYearFull = (date) => {
    if (moment(date).isValid()===false) {
        return ""
    }
    return moment(date).format('YYYY')
}