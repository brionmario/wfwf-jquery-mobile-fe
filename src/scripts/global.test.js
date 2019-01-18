import * as global from './global';

test('Year should not be null', () => {
  expect(global.getCurrentYear()).not.toBeNull();
});
