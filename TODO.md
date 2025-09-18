# TODO: Enhance Laravel Arsip Surat App

## 1. Modify welcome.blade.php to Dashboard
- [x] Replace default Laravel content with app layout extension
- [ ] Add dashboard sections: stats cards, recent surats, quick actions

## 2. Update SuratController index
- [x] Modify index method to show dashboard when no search
- [x] Add logic to fetch stats: total surats, by kategori, recent surats
- [x] Pass dashboard data to view
- [x] Optimize statistics calculations (moved from view to controller for better performance)

## 3. Add kategori filter to surats index
- [ ] Update surats/index.blade.php to include kategori dropdown filter
- [ ] Modify SuratController index to handle kategori filter

## 4. Update surat creation for dynamic kategori
- [ ] Read surats/create.blade.php
- [ ] Replace hardcoded kategori with dynamic from database
- [ ] Update SuratController create/store validation

## 5. Add pagination to surats list
- [ ] Update SuratController index to use paginate()
- [ ] Update surats/index.blade.php to show pagination links

## 6. Improve UI consistency
- [ ] Ensure consistent styling across views
- [ ] Fix any layout issues in kategori views
- [ ] Add responsive design improvements

## 7. Create new views if needed
- [ ] Create dashboard.blade.php if separate from welcome
- [ ] Update routes if needed for dashboard

## Testing
- [ ] Test dashboard display
- [ ] Test search and filters
- [ ] Test file upload/download
- [ ] Test kategori integration
