import './bootstrap';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

window.formatTime = (createdAt) => {
    return dayjs().diff(dayjs(createdAt), 'day') > 7
        ? dayjs(createdAt).format('MMMM D, YYYY')
        : dayjs(createdAt).fromNow();
};
