#!/bin/bash

# Clickit API - Test Files Cleanup Script
# Run this script to safely remove all testing files from the production environment.

echo "🧹 Cleaning up test scripts and scenarios..."

# List of files to delete
TEST_FILES=(
    "test_all_apis.php"
    "test_seller_apis.php"
    "seed_scenario.php"
    "create_test_seller.php"
)

for file in "${TEST_FILES[@]}"; do
    if [ -f "$file" ]; then
        rm "$file"
        echo "✅ Deleted: $file"
    else
        echo "⚠️ Not Found (Skipped): $file"
    fi
done

echo "🎉 Cleanup complete! The environment is clean."

# ----------------------------------------------------------------------------------
# NOTE FOR WINDOWS USERS (Powershell/CMD):
# If you don't have Bash installed, simply run the following command in Powershell:
# Remove-Item -ErrorAction SilentlyContinue test_all_apis.php, test_seller_apis.php, seed_scenario.php, create_test_seller.php
# Or in CMD:
# del test_all_apis.php test_seller_apis.php seed_scenario.php create_test_seller.php
# ----------------------------------------------------------------------------------
